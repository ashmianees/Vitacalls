<?php
    include("dashboard1.php");
    $con=mysqli_connect('localhost','root','','miniproject');
    $query1="select * from tbl_login";
    $res1=mysqli_query($con,$query1);
    $c1=mysqli_num_rows($res1);
    // $query2="select * from tbl_category";
    // $res2=mysqli_query($con,$query2);
    // $c2=mysqli_num_rows($res2);
   /*
    $query3="select * from tbl_subcategory";
    $res3=mysqli_query($con,$query3);
    $c3=mysqli_num_rows($res3);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        

    <style>
a{
    
  text-decoration:none;
  color:black;
}
.main{
  display:grid;
    grid-template-columns: repeat(3,1fr);
    gap:1rem;
}
   .box1,.box2,.box3,.box4,.box5,.box6{
       width:300px;
       height:150px;
       padding-left:10px;
       padding-top:-10px;
       padding-bottom:40px;
       padding-right:10px;
       margin-top:5px;
       border-radius:50px;
   }
   .box1{
    background-color:#7ff371;
    margin-left:50px;
    top:-100px;
    position: relative;
   margin-top:100px;
   }
   .box2{
    background-color:#ba2332;
    margin-left:105px;
    top:-100px;
    position: relative;
   margin-top:100px;
   }
   .box3{
    background-color:#bf6839;
   }
   .box4{
    background-color:#ba2332;
   }
   .box5{
    background-color:#ba2332;
   }
   .box6{
    background-color:#ba2332;
   }
   img {
    /* overflow-clip-margin: content-box; */
    /* overflow: clip; */
    height:100px;
    width:auto;
    padding-left:6px;
    margin-top:-15px;
}
   h3{
    font-size:30px;
    padding-left:15px;
   }
 </style>
</head>
<body>
<div  class="content">
<div class="main" id="main">
  <div class="box1">
    <a href="client.php">
    <h3>Users:
    <?php  echo "$c1"; ?></h3>
    <img src="images/user.png"/>
  </a>
  </div>
 <!-- <div class="box2">
  <a href="category.php">
  <h3>Category:
    <?php  echo "$c2"; ?></h3>
    <img src="category.png"/>
  </a>
  </div> -->
  <!--
  <div class="box3">
  <a href="subcategory.php">
  <h3>Subcategory 
    <?php  echo "(".$c3.")"; ?></h3>
    <img src="images/cat.png"/>
  </a>
  </div>
  <div class="box4">
  <a href="products.php">
    <h3>Products</h3>
    <img src="images/users.png"/>
  </a>
  </div>
  <div class="box5">
  <a href="order.php">
    <h3>Orders</h3>
    <img src="images/users.png"/>
  </a>
  </div>
  
</div>-->
</div>
</div>
</body>
</html>