<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header('location:home.php');
}
?>
<?php

// session_start();
$lid=$_SESSION['uid'];
$con = mysqli_connect("localhost", "root", "", "miniproject");
$q="select * from tbl_register where lid='$lid'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$q1="select * from tbl_login where lid='$lid'";
$result1=mysqli_query($con,$q1);
$row1=mysqli_fetch_array($result1);
if (isset($_POST['sub']))
{
	  $id=$row['id'];
    $txt=$_POST['age'];
    $txt1=$_POST['weight'];
    $txt2=$_POST['height'];
    $txt3=$_POST['bp'];
    $txt4=$_POST['cholesterol'];
    $txt5=$_POST['arms'];
    $txt6=$_POST['thighs'];
    $txt7=$_POST['diseases'];
    $txt8=$_POST['gender'];
    $txt9=$_POST['diet'];
	$query="insert into query(id,age,weight,height,bp,cholesterol,info,arms,thighs,gender,diet)values('$id','$txt','$txt1','$txt2','$txt3','$txt4','$txt7','$txt5','$txt6','$txt8','$txt9')";
	$result2=mysqli_query($con,$query);
  
  if($result)
  {
  ?>
    <script> alert('query submitted')</script>
    
    <?php
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>website Feedback</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
   <style>
      
      body, h1, h3, input { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1, h3 {
      padding: 10px 0;
      font-weight: 400;
      }
      h1 {
      font-size: 40px;
	  color:green;
	  font-family: "Times New Roman", Times, serif;
      }
      .main-block, .info {
      display: flex;
      flex-direction: column;
      width:100%;
      }
      .main-block {
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100%;
      background-size: cover;
      }
      form {
        width: 1200px;
        
      padding-left:100px;
      padding-top:20px;
      padding-bottom:20px;
      margin-top: 100px;
      padding-right:100px;
      margin-left:auto;
      margin-right:auto;
      border-radius: 5px;
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
      background: #ebebeb;
    }
      .info-item {
      width: 100%;
      }
      input {
      width: calc(100% - 57px);
      height: 36px;
      padding-left: 10px; 
      margin: 0 0 12px -5px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      .icon {
      padding: 9px 15px;
      margin-top: -1px;
      border-radius: 5px 0 0 5px;
      border: solid 0px #cbc9c9;
      background: #666;
      color: #fff;
      }
      input[type=radio] {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      text-indent: 32px;
      cursor: pointer;

      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 0.5px solid #8ebf42;
      background: #fff;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 8px;
      height: 4px;
      top: 5px;
      left: 4px;
      border-bottom: 3px solid #8ebf42;
      border-left: 3px solid #8ebf42;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      textarea {
      width: 99%;
      margin-bottom: 12px;
      }
      button {
      width: 100%;
      padding: 8px;
      border-radius: 5px; 
      border: none;
      background: orange; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      .grade-type div {
      display: flex;
      margin: 6px 0;
      }
      @media (min-width: 568px) {
      .info {
      flex-flow: row wrap;
      justify-content: space-between;
	  
      }
      .info-item {
      width: 48%;
      }
      }
	 

       /* Googlefont Poppins CDN Link */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

*{

  margin: 0;

  padding: 0;

  box-sizing: border-box;

  font-family: 'Poppins', sans-serif;

}

* {

  box-sizing: border-box;

}

 

input[type=text]
  {

  width: 200%;

  padding: 12px;

  border: 1px solid #ccc;

  border-radius: 4px;

  resize: vertical;

}

 

label {

  padding: 12px 12px 12px 0;

  display: inline-block;

}

 

input[type=submit] {

  background-color: #04AA6D;

  color: white;

  padding: 12px 20px;

  border: none;

  border-radius: 4px;

  cursor: pointer;

  float: right;


}

 

input[type=submit]:hover {

  background-color: #45a049;

}



 

.col-25 {

  float: left;

  width: 25%;

  margin-top: 6px;

}

 

.col-75 {

  float: left;

  width: 75%;

  margin-top: 6px;

}

 

/* Clear floats after the columns */

.row:after {

  content: "";

  display: table;

  clear: both;

}

 

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

@media screen and (max-width: 600px) {

  .col-25, .col-75, input[type=submit] {

    width: 100%;

    margin-top: 0;

  }

}

.sidebar{

  position: fixed;

  height: 100%;

  width: 240px;

  background: #FF5733 ;

  transition: all 0.5s ease;

}

.sidebar.active{

  width: 60px;

}

.sidebar .logo-details{

  height: 80px;

  display: flex;

  align-items: center;

}

.sidebar .logo-details i{

  font-size: 28px;

  font-weight: 500;

  color: #fff;

  min-width: 60px;

  text-align: center

}

.logodetails ibase_add_user{

  font-size: 28px;

  font-weight: 500;

  color: #fff;

  min-width: 60px;

  text-align: center

}

.sidebar .logo-details .logo_name{

  color: #fff;

  font-size: 24px;

  font-weight: 500;

}

 

.sidebar .nav-links{

  margin-top: 10px;

}

.sidebar .nav-links li{

  position: relative;

  list-style: none;

  height: 50px;

}

.sidebar .nav-links li a{

  height: 100%;

  width: 100%;

  display: flex;

  align-items: center;

  text-decoration: none;

  transition: all 0.4s ease;

}

.sidebar .nav-links li a.active{

  background: #F94E29;

}

.sidebar .nav-links li a:hover{

  background: #E28673;

}

.sidebar .nav-links li i{

  min-width: 60px;

  text-align: center;

  font-size: 18px;

  color: #fff;

}

.sidebar .nav-links li a .links_name{

  color: #fff;

  font-size: 15px;

  font-weight: 400;

  white-space: nowrap;

}

.sidebar .nav-links .log_out{

  position: absolute;

  bottom: 0;

  width: 100%;

}

.home-section{

  position: relative;

  background: #f5f5f5;

  padding-bottom:50px;

  min-height: 100vh;

  width: calc(100% - 240px);

  left: 240px;

  transition: all 0.5s ease;

}

.sidebar.active ~ .home-section{

  width: calc(100% - 60px);

  left: 60px;

}

.home-section nav{

  display: flex;

  justify-content: space-between;

  height: 80px;

  background: #fff;

  display: flex;

  align-items: center;

  position: fixed;

  width: calc(100% - 240px);

  left: 240px;

  z-index: 100;


  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);

  transition: all 0.5s ease;

}

.sidebar.active ~ .home-section nav{

  left: 60px;

  width: calc(100% - 60px);

}

.home-section nav .sidebar-button{

  display: flex;

  align-items: center;

  font-size: 24px;

  font-weight: 500;

}

nav .sidebar-button i{

  font-size: 35px;

  margin-right: 10px;

}

.home-section nav .search-box{

  position: relative;

  height: 50px;

  max-width: 550px;

  width: 100%;

  margin: 0 20px;

}

nav .search-box input{

  height: 100%;

  width: 100%;

  outline: none;

  background: #F5F6FA;

  border: 2px solid #EFEEF1;

  border-radius: 6px;

  font-size: 18px;

  padding: 0 15px;

}

nav .search-box .bx-search{

  position: absolute;

  height: 40px;

  width: 40px;

  background: #2697FF;

  right: 5px;

  top: 50%;

  transform: translateY(-50%);

  border-radius: 4px;

  line-height: 40px;

  text-align: center;

  color: #fff;

  font-size: 22px;

  transition: all 0.4 ease;

}

.home-section nav .profile-details{

  display: flex;

  align-items: center;

  background: #F5F6FA;

  border: 2px solid #EFEEF1;

  border-radius: 6px;

  height: 50px;

  min-width: 190px;

  padding: 0 15px 0 2px;

}

nav .profile-details img{

  height: 40px;

  width: 40px;

  border-radius: 6px;

  object-fit: cover;

}

nav .profile-details .admin_name{

  font-size: 15px;

  font-weight: 500;

  color: #333;

  margin: 0 10px;

  white-space: nowrap;

}

nav .profile-details i{

  font-size: 25px;

  color: #333;

}

.home-section .home-content{

  position: relative;

  padding-top: 104px;

}

.home-content .overview-boxes{

  display: flex;

  align-items: center;

  justify-content: space-between;

  flex-wrap: wrap;

  padding: 0 20px;

  margin-bottom: 26px;

}

.overview-boxes .box{

  display: flex;

  align-items: center;

  justify-content: center;

  width: calc(100% / 4 - 15px);

  background: #fff;

  padding: 15px 14px;

  border-radius: 12px;

  box-shadow: 0 5px 10px rgba(0,0,0,0.1);

}

.overview-boxes .box-topic{

  font-size: 20px;

  font-weight: 500;

}

.home-content .box .number{

  display: inline-block;

  font-size: 35px;

  margin-top: -6px;

  font-weight: 500;

}

.home-content .box .indicator{

  display: flex;

  align-items: center;

}

.home-content .box .indicator i{

  height: 20px;

  width: 20px;

  background: #8FDACB;

  line-height: 20px;

  text-align: center;

  border-radius: 50%;

  color: #fff;

  font-size: 20px;

  margin-right: 5px;

}

.box .indicator i.down{

  background: #e87d88;

}

.home-content .box .indicator .text{

  font-size: 12px;

}

.home-content .box .cart{

  display: inline-block;

  font-size: 32px;

  height: 50px;

  width: 50px;

  background: #cce5ff;

  line-height: 50px;

  text-align: center;

  color: #66b0ff;

  border-radius: 12px;

  margin: -15px 0 0 6px;

}

.home-content .box .cart.two{

   color: #2BD47D;

   background: #C0F2D8;

 }

.home-content .box .cart.three{

   color: #ffc233;

   background: #ffe8b3;

 }

.home-content .box .cart.four{

   color: #e05260;

   background: #f7d4d7;

 }

.home-content .total-order{

  font-size: 20px;

  font-weight: 500;

}

.home-content .sales-boxes{

  display: flex;

  justify-content: space-between;

  /* padding: 0 20px; */

}

 

/* left box */

.home-content .sales-boxes .recent-sales{

  width: 65%;

  background: #fff;

  padding: 20px 30px;

  margin: 10px 20px;

  border-radius: 12px;

  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

}

.home-content .sales-boxes .sales-details{

  display: flex;

  align-items: center;

  justify-content: space-between;

}

.sales-boxes .box .title{

  font-size: 24px;

  font-weight: 500;

  /* margin-bottom: 10px; */

}

.sales-boxes .sales-details li.topic{

  font-size: 20px;

  font-weight: 500;

}

.sales-boxes .sales-details li{

  list-style: none;

  margin: 8px 0;

}

.sales-boxes .sales-details li a{

  font-size: 18px;

  color: #333;

  font-size: 400;

  text-decoration: none;

}

.sales-boxes .box .button{

  width: 100%;

  display: flex;

  justify-content: flex-end;

}

.sales-boxes .box .button a{

  color: #fff;

  background: #0A2558;

  padding: 4px 12px;

  font-size: 15px;

  font-weight: 400;

  border-radius: 4px;

  text-decoration: none;

  transition: all 0.3s ease;

}

.sales-boxes .box .button a:hover{

  background:  #0d3073;

}

 

/* Right box */

.home-content .sales-boxes .top-sales{

  width: 35%;

  background: #fff;

  padding: 20px 30px;

  margin: 0 20px 0 0;

  border-radius: 12px;

  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

}

.sales-boxes .top-sales li{

  display: flex;

  align-items: center;

  justify-content: space-between;

  margin: 10px 0;

}

.sales-boxes .top-sales li a img{

  height: 40px;

  width: 40px;

  object-fit: cover;

  border-radius: 12px;

  margin-right: 10px;

  background: #333;

}

.sales-boxes .top-sales li a{

  display: flex;

  align-items: center;

  text-decoration: none;

}

.sales-boxes .top-sales li .product,

.price{

  font-size: 17px;

  font-weight: 400;

  color: #333;

}

/* Responsive Media Query */

@media (max-width: 1240px) {

  .sidebar{

    width: 60px;

  }

  .sidebar.active{

    width: 220px;

  }

  .home-section{

    width: calc(100% - 60px);

    left: 60px;

  }

  .sidebar.active ~ .home-section{

    /* width: calc(100% - 220px); */

    overflow: hidden;

    left: 220px;

  }

  .home-section nav{

    width: calc(100% - 60px);

    left: 60px;

  }

  .sidebar.active ~ .home-section nav{

    width: calc(100% - 220px);

    left: 220px;

  }

}

@media (max-width: 1150px) {

  .home-content .sales-boxes{

    flex-direction: column;

  }

  .home-content .sales-boxes .box{

    width: 100%;

    overflow-x: scroll;

    margin-bottom: 30px;

  }

  .home-content .sales-boxes .top-sales{

    margin: 0;

  }

}

@media (max-width: 1000px) {

  .overview-boxes .box{

    width: calc(100% / 2 - 15px);

    margin-bottom: 15px;

  }

}

@media (max-width: 700px) {

  nav .sidebar-button .dashboard,

  nav .profile-details .admin_name,

  nav .profile-details i{

    display: none;

  }

  .home-section nav .profile-details{

    height: 50px;

    min-width: 40px;

  }

  .home-content .sales-boxes .sales-details{

    width: 560px;

  }

}

@media (max-width: 550px) {

  .overview-boxes .box{

    width: 100%;

    margin-bottom: 15px;

  }

  .sidebar.active ~ .home-section nav .profile-details{

    display: none;

  }

}

  @media (max-width: 400px) {

  .sidebar{

    width: 0;

  }

  .sidebar.active{

    width: 60px;

  }

  .home-section{

    width: 100%;

    left: 0;

  }

  .sidebar.active ~ .home-section{

    left: 60px;

    width: calc(100% - 60px);

  }

  .home-section nav{

    width: 100%;

    left: 0;

  }

  .sidebar.active ~ .home-section nav{

    left: 60px;

    width: calc(100% - 60px);

  }

  .logo_name1{

    margin-right:800px;

    margin-bottom:20px;

  }
  .search-box{
  position: relative;
  height: 50px;
  max-width: 250px;
  width: 100%;
  margin: 0 20px;
}
    .img-radius {
      border-radius: 5px;
      margin-left:1000px;
    }
  }


    .container {
      margin: 10px;
      width: 628px;
      background: 787878;
      border-radius: 6px;
      margin-top: 5px;
      margin-left: 250px;
      padding: 82px 65px 30px 40px;
      box-shadow: -10px 10px 10px 10px rgba(0, 0, 0, 0.2);
    }
    </style>
    
  

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script>
    var v1 = 0;
    var v2 = 0;
    var v3 = 0;
    var v4 = 0;
    var v5 = 0;
    var v6 = 0;
    var v7 = 0;
    var v8 = 0;
	
	
    $(document).ready(function() {
      $("#error1").hide();
      $("#error2").hide();
      $("#error3").hide();
      $("#error4").hide();
      $("#error5").hide();
	    $("#error6").hide();
      $("#error7").hide();
	    $("#error8").hide();

	var age = /^[1-9]?[0-9]{1}$|^100$/;
      $("#p1").keyup(function() {
        x = document.getElementById("p1").value;
        if (age.test(x) == false) {
          v1 = 1
          $("#error1").show();
        } else if (age.test(x) == true) {
          v1 = 0;
          $("#error1").hide();
        }
      });
	  
	      var weight =/^[0-9]+$/;
      $("#p2").keyup(function() {
        x = document.getElementById("p2").value;
        if (weight.test(x) == false) {
          v2 = 1
          $("#error2").show();
        } else if (weight.test(x) == true) {
          v2 = 0
          $("#error2").hide();
        }
      });
	  

	  
	  	var height=/^[0-9]+$/;
	  $("#p3").keyup(function(){
		  x=document.getElementById("p3").value;
		  if(height.test(x)==false)
		  { v3=1
	        $("#error3").show();
		  }
		  else if(height.test(x)==true)
		  {
			  v3=0
			  $("#error3").hide();
		  }
	  });	
      
	  var bp=/^[0-9]+$/;
	  $("#p4").keyup(function(){
		  x=document.getElementById("p4").value;
		  if(bp.test(x)==false)
		  { v4=1
	        $("#error4").show();
		  }
		  else if(bp.test(x)==true)
		  {
			  v4=0
			  $("#error4").hide();
		  }
	  });	

      var cholesterol=/^[0-9]+$/;
	  $("#p5").keyup(function(){
		  x=document.getElementById("p5").value;
		  if(cholesterol.test(x)==false)
		  { v5=1
	        $("#error5").show();
		  }
		  else if(cholesterol.test(x)==true)
		  {
			  v5=0
			  $("#error5").hide();
		  }
	  });

    var arms=/^[0-9]+$/;
	  $("#p6").keyup(function(){
		  x=document.getElementById("p6").value;
		  if(cholesterol.test(x)==false)
		  { v6=1
	        $("#error6").show();
		  }
		  else if(cholesterol.test(x)==true)
		  {
			  v6=0
			  $("#error6").hide();
		  }
	  });

    var Thighs=/^[0-9]+$/;
	  $("#p8").keyup(function(){
		  x=document.getElementById("p8").value;
		  if(cholesterol.test(x)==false)
		  { v8=1
	        $("#error8").show();
		  }
		  else if(cholesterol.test(x)==true)
		  {
			  v8=0
			  $("#error8").hide();
		  }
	  });

	var diseases=/^(?![0-9]+$)[a-zA-Z0-9\s\,\#\-]+$/;
	  $("#p7").keyup(function(){
		  x=document.getElementById("p7").value;
		  if(diseases.test(x)==false)
		  { v7=1
	        $("#error7").show();
		  }
		  else if(cholesterol.test(x)==true)
		  {
			  v7=0
			  $("#error7").hide();
		  }
	  });	  
      
	  
	  
	  
	  
	

      
      $(".btn").click(function() {
        if (v1 == 0  && v2 == 0 && v3 == 0 && v4 == 0 && v5== 0 && v6== 0 && v7== 0 && v8== 0)
          return true;
        else {
          alert('Please Fill The Form Correctly');
          return false;
        }
      });
    });

  </script>
  </head>
  <body>
    
<div class="sidebar">

<div class="logo-details">

  &nbsp &nbsp <span class="logo_name"><img src="logo1.png" height="50" width="50"/></span>  &nbsp

  <i>Vita Calls</i>

</div>

    <ul class="nav-links">

      <li>

        <a href="" class="active">

          <i class='bx bx-grid-alt'></i>

          <span class="links_name"><b>Dashboard</b></span>

        </a>

      </li>

      <li>

        <a href="profile.php">

          <i class='bx bxs-user'></i>

          <span class="links_name">Profile</span>

        </a>

      </li>
      <li>

        <a href="payment.php">

          <i class='bx bxs-user'></i>

          <span class="links_name">Payment</span>

        </a>

      </li>

      <li>

        <a href="query.php">

          <i class="bx bxs-first-aid"></i>

          <span class="links_name">Post query</span>

        </a>

      </li>

      <li>

        <a href="passform.php">

          <i class=' bx bx-user-check'></i>

          <span class="links_name">Change Password</span>

        </a>

      </li>

      <li>

        <a href="activity.php">

          <i class=' bx bx-task'></i>

          <span class="links_name">Activity</span>

        </a>

      </li>

      <li>

        <a href="feedback.php">

          <i class='bx bx-edit'></i>

          <span class="links_name">Feedback</span>

        </a>

      </li>

      <li>

        <a href="complaint.php">

          <i class=' bx bx-comment-detail'></i>

          <span class="links_name">Complaints and Refund</span>

        </a>

      </li>

      <li>

        <a href="#">

          <i class=' bx bxs-time-five'></i>

          <span class="links_name">Schedule</span>

        </a>

      </li>

      <li class="log_out">

        <a href="logout.php">

          <i class='bx bx-log-out'></i>

          <span class="links_name">Log out</span>

        </a>

      </li>

    </ul>

  </div>

  <section class="home-section">

    <nav>

      <div class="sidebar-button">

        <i class='bx bx-menu sidebarBtn'></i>

        <span class="dashboard">Dashboard</span>
        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
  </div>
      </div>
  </nav>
 
    <div class="main-block">
	<h1>DETAILS</h1>
	<div class="info">
            <form action="#" method="POST">
            <table>
                <tr>
                <td>
                <div class="info-item">
                  <label>Age</label>
                  <input type="text" placeholder="Enter age" name="age" id="p1" required />
                  <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Age </p><br>
                </div>
                </td>
         
                <td>
                <div class="info-item">
                  <label>Weight</label>
                  <input type="text" placeholder="ENTER WEIGHT" name="weight" id="p2" required />
                  <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed</p><br>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <div class="info-item">
                  <label>Height</label>
                  <input type="text" placeholder="ENTER HEIGHT" name="height" id="p3" required />
                  <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed</p><br>
                </div>
                </td>
                <td>
                <div class="info-item">
                  <label>Enter Waist(in Cm)</label>
                  <input type="text" placeholder="ENTER YOUR WAIST SIZE" name="bp" id="p4" required />
                  <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed </p><br>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <div class="info-item">
                  <label>Enter Hip(in cm)</label>
                  <input type="text" placeholder="ENTER YOUR HIP SIZE" name="cholesterol" id="p5" required />
                  <p id="error5"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed </p><br>
                </div>
                </td>
                <td>
                <div class="info-item">
                  <label>Enter Arms(in cm)</label>
                  <input type="text" placeholder="ENTER YOUR ARMS SIZE" name="arms" id="p8" required />
                  <p id="error8"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed </p><br>
                </div>
                </td>
                <tr>
                <td>
                <div class="info-item">
                  <label>Enter Thighs(in cm)</label>
                  <input type="text" placeholder="ENTER YOUR THIGHS SIZE" name="thighs" id="p6" required />
                  <p id="error6"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid number.Only Numbers Allowed </p><br>
                </div>
                </td>

                <td>
                <div class="info-item">
                <label>Any Diseases</label>
                  <input type="text" placeholder="ANY DISEASES" name="diseases" id="p7" required />
                  <p id="error7"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Diseases </p><br>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                <label for="cars">Choose Your Gender:</label>
  <select name="gender" id="gender">
  <option value="" disabled selected>---- Choose Your Gender ----</option>
    <option value="Female">Female</option>
    <option value="Male">Male</option>
    <option value="Others">Others</option>
  
  </select>
  </td>
  <td>
                <label for="cars">Choose Your Gender:</label>
  <select name="diet" id="diet">
  <option value="" disabled selected>---- Choose Diet ----</option>
    <option value="Weight Gain">Weight Gain</option>
    <option value="Weight Loss">Weight Loss</option>
    <option value="Diet Management">Diet Management</option>
    <option value="Cholesterol Management">Cholesterol Management</option>
  
  </select>
  </td>

  </tr>
              <tr>
                <td colspan="2">
                <button type="submit"  name="sub">Submit</a></button>
                </td>
              </tr>
            </table>
            </div>
 <div>
          </form>
 
  </body>
  <script>


let sidebar = document.querySelector(".sidebar");

let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {

  sidebar.classList.toggle("active");

  if (sidebar.classList.contains("active")) {

    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");

  } else

    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");

}
  </script>
  </html>