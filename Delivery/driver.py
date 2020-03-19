#### DRIVER MS ####

import pika
import json
import atexit

hostname="localhost"
port=5672
userid=None
connection=pika.BlockingConnection(pika.ConnectionParameters(host=hostname,port=port))
channel=connection.channel()
exchangename="delivery_exchange"
channel.exchange_declare(exchange=exchangename, exchange_type='topic')

def complete_job(orderid):
    channel.queue_declare(queue="delivery", durable=True)
    channel.queue_bind(exchange=exchangename, queue="delivery", routing_key='delivery')
    channel.basic_publish(exchange=exchangename, routing_key="delivery", body=json.dumps(["completed",[userid,orderid]]),
        properties=pika.BasicProperties(delivery_mode=2))
    print("Job completed! Thank you.")
    print("Waiting for new job....")

def callback(channel, method, properties, body): 
    raw_message=json.loads(body)
    key=raw_message[0]
    message=raw_message[1]
    print(message)

    if key=="validate":
        if (not message):
            print("Invalid user. Goodbye!")
            connection.close()
    elif key=="order":
        orderid=message[0]
        address=message[1]
        print("Order", orderid, "has been assigned to you.")
        print("Address:", address)
        a = input('Press any key when you have completed the job')
        if a:
            complete_job(orderid)

def receive_message():
    channelqueue = channel.queue_declare(queue="driver_"+userid, durable=True)
    queue_name = channelqueue.method.queue
    channel.queue_bind(exchange=exchangename, queue=queue_name, routing_key=userid+".driver")
    channel.basic_qos(prefetch_count=1) 
    channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
    channel.start_consuming()

def send_validate(userid):
    channel.queue_declare(queue="delivery", durable=True)
    channel.queue_bind(exchange=exchangename, queue="delivery", routing_key='delivery')
    channel.basic_publish(exchange=exchangename, routing_key="delivery", body=json.dumps(["validate",userid]),
        properties=pika.BasicProperties(delivery_mode=2))

def terminate():
    if userid != None:
        channel.queue_declare(queue="delivery", durable=True)
        channel.queue_bind(exchange=exchangename, queue="delivery", routing_key='delivery')
        channel.basic_publish(exchange=exchangename, routing_key="delivery", body=json.dumps(["exit",userid]),
            properties=pika.BasicProperties(delivery_mode=2))
        connection.close()

atexit.register(terminate)

if __name__ == "__main__":  # execute this program only if it is run as a script (not by 'import')
    print("WELCOME TO DRIVER MS")
    userid=input("Please enter your DriverID (case-sensitive) to log in: ")
    send_validate(userid)

    receive_message()