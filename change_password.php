<?php
 
 $con=mysqli_connect("localhost","root","","miniproject");
  if(isset($_POST['password_reset']))
  {
    $email=$_GET['email'];
    $npass=$_POST['new_password'];
    $cnewpass=$_POST['cnew_password'];
    $token=$_GET['token'];
    if(!empty($token))
    {
        if(!empty($token) && !empty($npass) && !empty($cnewpass))
        {
            $check_token="SELECT verify_token from tbl_login where verify_token='$token' and 'status'=0";
            $check_token_run=mysqli_query($con, $check_token);
            if(mysqli_num_rows($check_token_run)>0)
            {
                if($npass=$cnewpass)
                {
                    $updatepassword="UPDATE tbl_login SET password='$npass' where verify_token='$token'";
                    $updatepassword_run=mysqli_query($con, $updatepassword);
                    if($updatepassword_run)
                    {
                        echo "<script> alert('Password Updated'); </script>";
                         header('location:login.php');
                    }
                }
                else{
                    echo "<script> alert('Password not match'); </script>";
                    header('location:change_password.php');
                }
            }
        }
        else
        {
            echo "<script> alert('invalid'); </script>";
            header('location:change_password.php');
        }
    }
    else
    {
        echo "<script> alert('No token'); </script>";
        header('location:change_password.php');
    }
    }
?>
<!doctype html>
<html lang="en">
<head>
    
<title> VITA CALLS</title>
	<link rel="icon" href="logo1.png" />	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <script>

    </script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.sidebar {
  position: fixed;
  height: 100%;
  width: 240px;
  background: #0A2558;
  transition: all 0.5s ease;
}

.sidebar.active {
  width: 60px;
}

.sidebar .logo-details {
  height: 80px;
  display: flex;
  align-items: center;
}

.sidebar .logo-details i {
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}

.logodetails ibase_add_user {
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}

.sidebar .logo-details .logo_name {
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}

.sidebar .nav-links {
  margin-top: 10px;
}

.sidebar .nav-links li {
  position: relative;
  list-style: none;
  height: 50px;
}

.sidebar .nav-links li a {
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}

.sidebar .nav-links li a.active {
  background: #081D45;
}

.sidebar .nav-links li a:hover {
  background: #081D45;
}

.sidebar .nav-links li i {
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}

.sidebar .nav-links li a .links_name {
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}

.sidebar .nav-links .log_out {
  position: absolute;
  bottom: 0;
  width: 100%;
}

.home-section {
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}

.sidebar.active~.home-section {
  width: calc(100% - 60px);
  left: 60px;
}

.home-section nav {
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
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}

.sidebar.active~.home-section nav {
  left: 60px;
  width: calc(100% - 60px);
}

.home-section nav .sidebar-button {
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}

nav .sidebar-button i {
  font-size: 35px;
  margin-right: 10px;
}

.home-section nav .search-box {
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}

nav .search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}

nav .search-box .bx-search {
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

.home-section nav .profile-details {
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}

nav .profile-details img {
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}

nav .profile-details .admin_name {
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}

nav .profile-details i {
  font-size: 25px;
  color: #333;
}

.home-section .home-content {
  position: relative;
  padding-top: 104px;
}

.home-content .overview-boxes {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
}

.overview-boxes .box {
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.overview-boxes .box-topic {
  font-size: 20px;
  font-weight: 500;
}

.home-content .box .number {
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
}

.home-content .box .indicator {
  display: flex;
  align-items: center;
}

.home-content .box .indicator i {
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

.box .indicator i.down {
  background: #e87d88;
}

.home-content .box .indicator .text {
  font-size: 12px;
}

.home-content .box .cart {
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

.home-content .box .cart.two {
  color: #2BD47D;
  background: #C0F2D8;
}

.home-content .box .cart.three {
  color: #ffc233;
  background: #ffe8b3;
}

.home-content .box .cart.four {
  color: #e05260;
  background: #f7d4d7;
}

.home-content .total-order {
  font-size: 20px;
  font-weight: 500;
}

.home-content .sales-boxes {
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .sales-boxes .recent-sales {
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.home-content .sales-boxes .sales-details {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.sales-boxes .box .title {
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}

.sales-boxes .sales-details li.topic {
  font-size: 20px;
  font-weight: 500;
}

.sales-boxes .sales-details li {
  list-style: none;
  margin: 8px 0;
}

.sales-boxes .sales-details li a {
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}

.sales-boxes .box .button {
  width: 100%;
  display: flex;
  justify-content: flex-end;
}

.sales-boxes .box .button a {
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.sales-boxes .box .button a:hover {
  background: #0d3073;
}

/* Right box */
.home-content .sales-boxes .top-sales {
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.sales-boxes .top-sales li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}

.sales-boxes .top-sales li a img {
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}

.sales-boxes .top-sales li a {
  display: flex;
  align-items: center;
  text-decoration: none;
}

.sales-boxes .top-sales li .product,
.price {
  font-size: 17px;
  font-weight: 400;
  color: #333;
}

/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar {
    width: 60px;
  }

  .sidebar.active {
    width: 220px;
  }

  .home-section {
    width: calc(100% - 60px);
    left: 60px;
  }

  .sidebar.active~.home-section {
    /* width: calc(100% - 220px); */
    overflow: hidden;
    left: 220px;
  }

  .home-section nav {
    width: calc(100% - 60px);
    left: 60px;
  }

  .sidebar.active~.home-section nav {
    width: calc(100% - 220px);
    left: 220px;
  }
}

@media (max-width: 1150px) {
  .home-content .sales-boxes {
    flex-direction: column;
  }

  .home-content .sales-boxes .box {
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }

  .home-content .sales-boxes .top-sales {
    margin: 0;
  }
}

@media (max-width: 1000px) {
  .overview-boxes .box {
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}

@media (max-width: 700px) {

  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i {
    display: none;
  }

  .home-section nav .profile-details {
    height: 50px;
    min-width: 40px;
  }

  .home-content .sales-boxes .sales-details {
    width: 560px;
  }
}

@media (max-width: 550px) {
  .overview-boxes .box {
    width: 100%;
    margin-bottom: 15px;
  }

  .sidebar.active~.home-section nav .profile-details {
    display: none;
  }
}

@media (max-width: 400px) {
  .sidebar {
    width: 0;
  }

  .sidebar.active {
    width: 60px;
  }

  .home-section {
    width: 100%;
    left: 0;
  }

  .sidebar.active~.home-section {
    left: 60px;
    width: calc(100% - 60px);
  }

  .home-section nav {
    width: 100%;
    left: 0;
  }

  .sidebar.active~.home-section nav {
    left: 60px;
    width: calc(100% - 60px);
  }

  .logo_name1 {
    margin-right: 800px;
    margin-bottom: 20px;
  }
}


/* add animation effects */
@-webkit-keyframes animatetop {
  from {
    top: -300px;
    opacity: 0
  }

  to {
    top: 0;
    opacity: 1
  }
}

@keyframes animatetop {
  from {
    top: -300px;
    opacity: 0
  }

  to {
    top: 0;
    opacity: 1
  }
}

input[type=text],
input[type=password],
select {
  width: 100%;
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
  margin-right: 20px;
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

.container {
  font-size: 14px;
  width: 600px;
  /* margin-top: 850px; */
  margin-top: 200px;
  margin-left: 400px;
  border-radius: 25px;
   background-color: #f2f2f9; 
  padding: 20px;
  /* overflow: scroll; */
}

.home-section > .container {
  padding-top: 100px;
  margin-left: 70px;
}

/* .container input {
  height: 30px;
} */

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

  .col-25,
  .col-75,
  input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

.register {
  color: white;
  padding-top: 10px;
  padding-left: 110px;
  font-size: 12px;
}
    
table {
  
  background-color: #f2f2a9; 
  border-radius:12px;
    width: 1070px;
    padding-left:20px;
    margin-bottom: 20px;
}

th,
td {
border-bottom: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}
th button {
    padding: 7px 40px;
    margin-left:710px;
    border: none;
    font-size:15px;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
}
.add-btn{
    background-color: #f44336;
}

.view-btn:hover,
.delete-btn:hover,
.add-btn:hover {
    opacity: 0.8;
}

th,td {
    font-weight: bold;
    font-size:15px;
}
b{
font-size:20px;
color:#d2632f;
}
.bx bxs-user-circle
{
size:200px;
}
body
{
background:#d2632f;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
    var v1 = 0;
    var v2 = 0;
    $(document).ready(function () {
      $("#error3").hide();
      $("#error2").hide();
      $("#exist").hide();

    

      psw1 = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#p2").keyup(function () {
        x1 = document.getElementById("p2").value;
        if (psw1.test(x1) == false) {
          v1 = 1
          $("#error2").show();
        }
        else if (psw1.test(x1) == true) {
          v1 = 0;
          $("#error2").hide();
        }
      });

      psw2 = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#p3").keyup(function () {
        y1 = document.getElementById("p3").value;
        if (document.getElementById("p2").value != document.getElementById("p3").value) {
          v2 = 1
          $("#error3").show();
        }
        else if (document.getElementById("p2").value == document.getElementById("p3").value) {
          v2 = 0;
          $("#error3").hide();
        }
      });
      $("#btn").click(function () {
        if (v1 == 0 && v2 == 0 )
          $("#error4").hide();
        else {
          alert('Please Fill The Form Correctly');
          return false;
        }
      });

    });
  </script>
</head>

<body>
    <div class="container">
    <form method="post">
          <h2><b> Update Password</b></h2><br>
          <form method="POST">

          <div class="row">
            <div class="col-25">
              <label for="pass2">New Password</label>
            </div>
            <div class="col-75">
            <input type="password" placeholder="Enter new Password" name="new_password"  id="p2" required/>
              <span>
              <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;minimum 8 characters like letters,digits and one special character</b></p><br>
              </span>
            </div>
          </div><br>
          <div class="row">
            <div class="col-25">
              <label for="pass2">Confirm Password</label>
            </div>
            <div class="col-75">
            <input type="password" placeholder="Confirm new Password" name="cnew_password"  id="p3" required/>
              <span>
              <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;minimum 8 characters like letters,digits and one special character</b></p><br>
              </span>
            </div>
          </div><br>

          <div class="row">
            <br>
            <input type="submit" name="password_reset"  value="Update" class="submit"/>
          </div>
        </form>
      </div>
      </div>


    </body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>
<script src="assets/js/validate.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>