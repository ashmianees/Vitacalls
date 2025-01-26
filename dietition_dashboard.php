<?php
session_start();
if(!isset($_SESSION['did']))
{
  header('location:home.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script>
  $(document).ready(function(){
      $(".submenu").hide();
      $(".sub").hide();
  $("#user-icon").click(function(){
    $(".submenu").toggle();
  });
  $("#button").click(function(){
    $(".sub").toggle();
  });
  });
</script>
<style>
body {
  font-family:cursive;
}
header{
    position:absolute;
    left:0;
    top:0;
    width:100%;
    display:flex;
    align-items: center;
    justify-content: space-between;
    padding:41px 1%;
    background:#e31212;
    height:15px;
    transition: margin-left .5s;
}

#admin-menu{
    color:white;
    font-size:25px;
    margin-left:-1126px;
}
#user-icon{
    color:white;
    font-size:16px;
    padding-right:50px;
}
#name{
  margin-top:38px;
  margin-right:60px;
  color:white;
}
.sidebar {
  min-height: 500px;
  height:664px;
  width: 210px;
  position: absolute;
  z-index: 1;
  top: 80px;
  left: 0;
  background-color:#e31212;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar .btn {
  padding: 20px 20px 8px 15px;
  text-decoration: none;
  font-size: 15px;
  color:white;
  display: block;
  transition: 0.3s;
  text-transform:uppercase;
  background:transparent;
  outline:none;
  border:none;
  width:200px;
}
.sidebar .btn a{
  margin-left:10px;
  text-decoration: none;
  font-size: 15px;
  color:white;
  display: block;
  transition: 0.3s;
  text-transform:uppercase;
  background:transparent;
  outline:none;
  border:none;
  width:200px;
  text-align:left;
}

.sidebar .btn:hover {
  color: #f1f1f1;
  transform:translateX(25px);
  background-color:#e31212;
  border-radius:30px;
  margin-left:-20px;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color:white;
  background:transparent;
  border:none;
  outline:none;
}
.sub{
  padding: 10px 20px 8px 15px;
  text-decoration: none;
  font-size: 15px;
  color:white;
  display: block;
  transition: 0.3s;
  text-transform:uppercase;
  background:transparent;
  outline:none;
  border:none;
  width:200px;
  display:none;
}
#button a:hover .sub{
  display:block;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
.content{
  margin: 100px  50px 20px 240px;
  padding:30px;
  box-shadow: 1px 1px 5px 1px;
  min-height:420px;
  height:auto;
  transition: margin-left .5s;
}

.submenu{
  background-color:white;
  height:130px;
  width:150px;
  padding:20px;
  margin-top:280px;
  margin-left:-200px;
  margin-right:40px;
  display:none;
}
.btns{
  border:none;
  outline:none;
  background:transparent;
  line-height:40px;
  text-decoration:none;
  color:black;
}
.btns:hover{
  height:40px;
  width:160px;
  color:white;
  background-color:#D16C6C;
  border-radius:20px;
  padding-left:5px;
}
 .logo-details {

height: 80px;

display: flex;

align-items: center;

}

.logo-details i {

font-size: 28px;

font-weight: 500;

color: #fff;

min-width: 60px;

text-align: center
}



</style>
</head>
<body>
<header id="header">
  
<div class="logo-details">

&nbsp &nbsp <span class="logo_name"><img src="logo1.png" height="50" width="50" /></span> &nbsp

<i>Vita Calls</i>

</div>
  <span  id="admin-menu" onclick="openNav()">&#9776;</span>
   <h2 id="name">Dietition</h2>
</div>
  <div class="submenu">
    </header>
  
<div id="mySidenav" class="sidebar">
  <button  class="closebtn" onclick="closeNav()">&times;</button>
  <button class="btn" ><a href="#">dashboard</a></button><br>
  <button class="btn" ><a href="dietition_profile.php">Profile</a></button><br>
  <button class="btn" ><a href="view.php">Dieter</a></button><br>
  <button class="btn" ><a href="daily_activity.php">Daily Activity</a></button><br>
  <button class="btn" ><a href="#">Payment</a></button><br>
<!--   
  <button class="btn" id="button"><a>User Query</a></button><br>
  <div class="sub">
  <button class="btn" ><a href="select_query.php">Query</a></button>
    <button class="btn" ><a href="activity_view.php">Activity</a></button>
   <button class="btn" ><a href="view_feedback.php">Feedback</a></button>
  <button class="btn" ><a href="view_complaint.php">Complaints</a></button>
  <button class="btn" ><a href="search.php">Check Complaints</a></button>
  </div> -->

  <button class="btn" ><a href="dietition_logout.php">logout</a></button>
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "180px";
  document.getElementById("content").style.marginLeft = "210px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("content").style.marginLeft= "0";
}

function closepop() {
  document.getElementById("add_cat").display = "none";
}

</script>
   
</body>
</html>