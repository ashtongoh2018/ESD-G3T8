

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" 
    content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="app.html.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
<title>Restaurant UI</title>
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>

<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

#left {
  width: 400px;
  float: left;
  padding: 20px;
}
#right {
  width: 400px;
  float: left;
  padding: 20px;

  /* margin-left: 400px;
  float: right; */

  /* Change this to whatever the width of your left column is*/
}
.clear {
  clear: both;
}


.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

.center {
  margin: 40px;
  width: 100%;
  /* border: 3px solid green; */
  padding: 10px;
  display:inline-block;

}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

input[type="text"], textarea {

background-color : #d1d1d1; 

}

</style>
</head>




<body>


<div class = 'center'>
<h2> Checkout Form</h2> 
  <div id="left">
  <!-- <div class="input-box"> -->

      <!-- <form id="subtotalForm"> -->
        <h3>Order Details</h3>
        <form id = 'form1' action = "subtotal.php" method = 'POST'>
        <label for="name">Name </label>
        <input type="text" id = 'name' name="name" value="<?php echo $_POST['name'];?>" readonly />
        
        <label for="email">Email </label>
        <input type="text" id = 'email' name="email" value="<?php echo $_POST['email'];?>" readonly />
          
        <label for="telegram">Telegram</label>
        <input type="text" id = 'telegram_id' name="telegram_id" value="<?php echo $_POST['telegram_id'];?>" readonly />
          
        <label for="quantity">Quantity</label>
        <input type="text" id = 'quantity' name="quantity" value="<?php echo $_POST['quantity'];?>" readonly />
          
        <label for="address">Address</label>
        <input type="text" id = 'address' name="address" value="<?php echo $_POST['address'];?>" readonly />
          
        <label for="phone">Phone</label>
        <input type="text" id = 'phone' name="phone" value="<?php echo $_POST['phone'];?>" readonly />

        <label for="region">Region</label>
        <input type="text" id = 'region' name="region" value="<?php echo $_POST['region'];?>" readonly />

        <label for="price">Delivery Pricing</label>
        <input type="text" id = 'price' name="price" id="price" value="<?php echo $_POST['price'];?>" readonly />
        
        
      </div>


      
      <div id = 'right'>
        <h3>Payment</h3>
        
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" value = "<?php echo $_POST['cardname']; ?>" readonly>
        <label for="ccnum">Credit card number</label>
        <input type="text" id="ccnum" name="cardnumber" value = "<?php echo $_POST['cardnumber']; ?>" readonly>
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" value = "<?php echo $_POST['expmonth']; ?>" readonly>
        <label for="expyear">Exp Year</label>
        <input type="text" id="expyear" name="expyear" value = "<?php echo $_POST['expyear']; ?>" readonly>
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" value = "<?php echo $_POST['cvv']; ?>" readonly>

       
      </div>

      <div id = 'right'>
          <h3>SubTotal</h3>
          <?php
            $total = 0;
            $quantity = $_POST['quantity'];
            $quantity = (int) $quantity;
            $price = $_POST['price'];
            $price = (float) $price;

            $total = $quantity * 3 + $price;
    
          ?>

          <label for="cname">Subtotal (incl. delivery)</label>
          <input type="text" id="cname" name="cardname" placeholder = "$ <?php echo $total; ?>" style="background-color: #FFE9CC; border:2px solid #000000; " readonly>

          <!-- border:1px solid #ff0000;  -->

          <div class="col-md-12 btnpad">
              <div class="contacts-btn-pad">
                <button id ='submitBtn' class = 'contacts-btn' >Final Checkout
                  <!-- <a id = 'submitBtn' name = 'submit'>Final Checkout</a> -->
                </button>
              </div>
            </div>
      </div>
      </form>
      <!-- <table id="tableresults" class='table table-striped'>
        <tr>
            <th>cname</th>
            <th>ccnumber</th>
            <th>expmonth</th>
            <th>expyear</th>
            <th>cvv</th> -->

        </tr>  
    </table>

       
  </div>
  </div>
</div>

<script>
//  function showError(message) {
//         // Display an error under the the predefined label with error as the id
//         $('#error').text(message);
//     }

//     $("#subtotalForm").submit(async (event) => {
//         //Prevents screen from refreshing when submitting
//         event.preventDefault();

//         var serviceURL = "http://127.0.0.1:5000/order.py";
//         var homeURL = "http://127.0.0.1/index.php";

//         //Get form data 

//         var cname = $('#cname').val();
//         var ccnumber = $('#ccnumber').val();
//         var expmonth= $('#expmonth').val();
//         var expyear = $('#expyear').val();
//         var cvv = $('#cvv').val();


//         serviceURL = "http://127.0.0.1:5000/order";

//         // form the POST url which includes the dynamic isbnNumber
//         try {
//             const response =
//                 await fetch(
//                     serviceURL, {
//                     method: "POST",
//                     headers: { "Content-Type": "application/json" },
//                     body: JSON.stringify({ cname: cname, ccnumber:ccnumber, expmonth:expmonth, expyear:expyear, cvv:cvv })
//                 });

//             const data = await response.json();

//             if (response.ok) {
//                 // relocate to home page
//                 window.location.replace(homeURL);
//                 return false;
//             } else {
//                 console.log(data);
//                 addBook = 
//                 "<tbody>" +
//                 "<tr>" +
//                 "<td>" + cname + "</td>" + 
//                 "<td>" + ccnumber + "</td>" +
//                 "<td>" + expmonth+ "</td>" +
//                 "<td>" + expyear + "</td>" +
//                 "<td>" + cvv + "</td>" +

//                 "</tr>" +
//                 "</body>"
//                 $("#tableresults").append( addBook );

//                 showError(data.message);
//             }
//         } catch (error) {
//             // Errors when calling the service; such as network error, 
//             // service offline, etc
//             showError
//                 ("There is a problem submiting your order, please try again later. " + error);

//         } // error
//     });

</script>
</body>
</html>
