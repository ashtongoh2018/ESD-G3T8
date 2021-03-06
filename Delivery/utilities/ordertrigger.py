#### ORDER SIMULATION ####
# this is just a temporary simulation!!!

import pika
import json
import time
import random
import os

orderaddresses=["1 Esplanade Dr, Singapore 038981", "Orchard Road, Singapore 238823", "38 Oxley Road, Singapore 238629"]
telegram="485352799"

# hostname="localhost"
# port=5672
# connection=pika.BlockingConnection(pika.ConnectionParameters(host=hostname,port=port))

url = os.environ.get('CLOUDAMQP_URL', 'amqp://sbxhlzzm:q42q4qSoxVcLot-eh0-7XCICIM88hjX-@hornet.rmq.cloudamqp.com/sbxhlzzm')
params = pika.URLParameters(url)
connection=pika.BlockingConnection(params)

channel=connection.channel()
exchangename="delivery_exchange"
channel.exchange_declare(exchange=exchangename, exchange_type='topic')

def trigger_ashton_order():
    orderid = 1
    orderaddress= "Block 123 Ang Mo Kio Avenue 3 #01-01 Singapore 560123"
    ordertelegram="485352799"
    send_order(orderid, orderaddress, ordertelegram)

def trigger_order(): #temporary function to trigger order
    ordernumber = random.randint(0,2147483640)
    orderaddress= orderaddresses[random.randint(0,2)]
    ordertelegram="485352799"
    send_order(ordernumber, orderaddress, ordertelegram)

def send_order(ordernumber, address,telegram):
    channel.queue_declare(queue="delivery", durable=True)
    channel.queue_bind(exchange=exchangename, queue="delivery", routing_key='delivery')
    channel.basic_publish(exchange=exchangename, routing_key="delivery", body=json.dumps(["order",[ordernumber,address,telegram]]),
        properties=pika.BasicProperties(delivery_mode=2))
    print("order", ordernumber, ":", address, "sent")    

if __name__ == "__main__":  # execute this program only if it is run as a script (not by 'import')
    print("ORDER SIMULATION")
    #temporary code to trigger order arrival
    # time.sleep(60)
    # trigger_ashton_order()
    while True:
        trigger_order()
        time.sleep(30)
    #end temporary code