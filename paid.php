
<html>
<title> Vita Calls</title>
	<link rel="icon" href="logo1.png" />	
  <head>

<style>
  body{

    background:#add46e;
}
  .container {
      font-size: 14px;
      width: 400px;
      margin-top: 250px; 
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      margin-left:400px;
      padding: 50px;
      background:#fff;
      /* overflow: scroll; */
    }

    .home-section > .container {
       padding-left: -12px;
    }
ul{
  margin-left:-50px;
}
    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
    }
   #rzp-button1 {
        background-color: #55df1d;
        padding: 7px 10px;
        border: none;
        font-size: 13px;
        border-radius: 12px;
        color: #fff;
        cursor: pointer;
        margin-left: 150px;
      }
      b{
        padding-left:20px;
  font-size:25px;
  color:#386e21;
}
</style>

  </head>
  <!--
  <section class="home-section">
    <div class="container">
 <b>Complete Payment Process</b><br><br>
    <button id="rzp-button1" class="btn btn-outline-dark btn-lg"><i class="fas fa-money-bill"></i>Processed to pay</button>
  </div>
  
  </section>


  </body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var options = {
    "key": "rzp_test_30TVb9S9m1Jwja", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $a*100;?>",
    "currency": "INR",
    "description": "Vita Calls",
    "handler":function(response){
      console.log(response);
      jQuery.ajax({
        type:"POST",
        url:"pay.php",
        data:"pay_id="+response.razorpay_payment_id,
        success:function(result){
          window.location.href="history.php";
        }
      })
 
   
  }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    
    rzp1.open();
    e.preventDefault();
  }
</script>
</html>-->
<?php 
session_start();
if(isset($_GET['amount'])){
  $a=$_GET['amount'];
  $a=$a*100;

}

// $a=$_SESSION['amount'];

// $_SESSION['amount']=$a;

// $a=$a*100;
// $_SESSION['booking']="";
?>
<html>
<button id="rzp-button1" class="btn btn-outline-dark btn-lg"><i class="fas fa-money-bill"></i>Processed to pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var options = {
    "key": "rzp_test_30TVb9S9m1Jwja", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $a?>",
    "currency": "INR",
    "description": "Vita Calls",
    "image": "https://www.keralatourism.org/images/caravan-tourism/caravan-kerala-logo.png",
    "handler":function(response){
      console.log(response);
      jQuery.ajax({
        type:"GET",
        url:"pay.php",
        data:"pay_id="+response.razorpay_payment_id,
        success:function(result){
       
        
        }
      })
 
   
  }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    
    rzp1.open();
    e.preventDefault();
  }
</script>