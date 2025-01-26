<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header('location:home.php');
}
?>
<!---Password Change ---->
<?php
// session_start();
if (isset($_SESSION['uid'])) {
    $lid = $_SESSION['uid'];
    if (isset($_POST['submit'])) {
        $ps = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "", "miniproject");
        $query = "update tbl_login set password='$ps' where lid='$lid'";
        $re = mysqli_query($con, $query);
        if ($re) {
?>
<script>
  alert("password changed successfully");
</script>
<?php
            header('Location: logout.php');
        } else {
        ?>
<script>
  alert("password change failed");
</script>
<?php
        }
    }
    ?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <title>Register Form</title>

  <style>
    /* Googlefont Poppins CDN Link */

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {

      margin: 0;

      padding: 0;

      box-sizing: border-box;

      font-family: 'Poppins', sans-serif;

    }

    * {

      box-sizing: border-box;

    }



    input[type=text],
    select,
    textarea {

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

      width: 1000px;

      margin-left: 200px;

      border-radius: 25px;

      background-color: #f2f2f2;

      padding: 20px;

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

      .col-25,
      .col-75,
      input[type=submit] {

        width: 100%;

        margin-top: 0;

      }

    }

    .sidebar {

      position: fixed;

      height: 100%;

      width: 240px;

      background: #FF5733;

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

      background: #F94E29;

    }

    .sidebar .nav-links li a:hover {

      background: #E28673;

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

      padding-bottom: 50px;

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

      margin: 10px 20px;

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





    .register {

      color: white;

      padding-top: 10px;

      padding-left: 110px;

      font-size: 12px;

    }



    #error1,
    #error3,
    #error4,
    #error5,
    #error6,
    #error2,
    #error7 {
      color: #cc0033;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 13px;
      font-weight: bold;
      line-height: 20px;
      text-shadow: 1px 1px rgba(250, 250, 250, .3);
    }

    body {
      background-color: #FF5733;
    }

    form {
      width: 500px;
      border: 2px solid #ccc;
      padding: 30px;
      background: #fff;
      border-radius: 15px;
    }

    input {
      display: block;
      border: 2px solid #ccc;
      width: 95%;
      padding: 10px;
      margin: 10px auto;
      border-radius: 5px;
    }

    .password-container {
      width: 100%;
      position: relative;
    }

    input,
    input[type=password] {
      width: 250px;
      height: 20px;
    }

    #submit {
      height: 30%;
    }

    .register .btn {
      text-decoration: none;
      color: white;
      padding: 10px 30px;
      background: #45a049;
      text-align: center;
      border-radius: 20px;
      transition: 0.3s;
    }

    .fa-eye {
      position: absolute;
      top: 29%;
      right: 25%;
      cursor: pointer;
      color: lightgray;
    }
    .img-radius1 {
    border-radius: 5px;
    margin-left: 1000px;
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function () {
      null
    };
  </script>
  <script>
    var ver1 = 1;
    var ver5 = 1;
    var ver6 = 1;
    var ver7 = 1;
    $(document).ready(function () {
      $("#error4").hide();
      /* $("#error3").hide();*/
      $("#error5").hide();
      $("#error6").hide();
      /*var conpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      $("#p3").keyup(function() {
          x = document.getElementById("p3").value;
          if (conpass.test(x) == false) {
              ver1 = 1;
              $("#error3").show();
          } else if (conpass.test(x) == true) {
              ver1 = 0;
              $("#error3").hide();
          }
      });*/
      var pass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#p4").keyup(function () {
        x = document.getElementById("p4").value;
        if (pass.test(x) == false) {
          ver5 = 1;
          $("#error4").show();
        } else if (pass.test(x) == true) {
          ver5 = 0;
          $("#error4").hide();
        }
      });
      $("#p5").keyup(function () {
        pass1 = document.getElementById("p4").value;
        pass2 = document.getElementById("p5").value;
        if (pass1 != pass2) {
          ver6 = 1;
          $("#error5").show();
        } else {
          ver6 = 0;
          $("#error5").hide();
        }
      });
      $("#submit").click(function () {
        if (ver5 == 0 && ver6 == 0 && ver7 == 0) {
          $("#error6").hide();
          return true;
        } else {
          $("#error6").show();
          return false;
        }
      });
    });

    function checkpass() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "passwordcheck.php",
        data: 'pass=' + $("#p3").val(),
        type: "POST",
        success: function (data) {
          $("#password-availability-status").html(data);
        },
        error: function () { }
      });
    }
  </script>
</head>

<body>
  <div class="sidebar">

    <div class="logo-details">

      &nbsp &nbsp <span class="logo_name"><img src="logo1.png" height="50" width="50" /></span> &nbsp

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

          <span class="links_name">Complaints</span>

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
        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius1" alt="User-Profile-Image">
      </div>

    </nav>

    <div class="container">
      <br><br><br><br><br><br>
      <form action="#" method="POST" class="login-email" enctype="multipart/form-data">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Change Password</p>
        <div class="input-group">
          <div class="password-container">
            <input type="password" class="op" placeholder=" Current Password" id="p3" name="password"
              onkeyup="checkpass()" required>
            <i class="fa fa-fw fa-eye field_icon" id="toggle_pwds" style="margin-left: -30px; cursor: pointer;"></i>
            <script type="text/javascript">
              const togglePassword = document.querySelector('#toggle_pwds');
              const password = document.querySelector('#p3');
              togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
              });
            </script>
          </div>
        </div>
        <!--<p id="error3">&nbsp; Password should include at-least eight characters,uppercase letter,lowercase
                        letter,number and special character.</p>--->
        <div id="password-availability-status" class="error"></div><br>
        <div class="input-group">
          <div class="password-container">
            <input type="password" class="np" placeholder="New Password" id="p4" name="password" required>
            <i class="fa fa-fw fa-eye field_icon" id="toggle_pwd" style="margin-left: -30px; cursor: pointer;"></i>
            <script type="text/javascript">
              const togglePassword1 = document.querySelector('#toggle_pwd');
              const newpassword = document.querySelector('#p4');
              togglePassword1.addEventListener('click', function (g) {
                // toggle the type attribute
                const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
                newpassword.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
              });
            </script>
          </div>
        </div>
        <p id="error4">&nbsp;Password should include at-least eight characters,uppercase letter,lowercase
          letter,number and special character.</p>
        <div class="input-group">
          <div class="password-container">
            <input type="password" class="c_np" id="p5" placeholder="Confirm Password" name="cpassword" required>
            <i class="fa fa-fw fa-eye field_icon" id="togglepwd" style="margin-left: -30px; cursor: pointer;"></i>
            <script type="text/javascript">
              const togglePassword2 = document.querySelector('#togglepwd');
              const cppassword = document.querySelector('#p5');
              togglePassword2.addEventListener('click', function (f) {
                // toggle the type attribute
                const type = cppassword.getAttribute('type') === 'password' ? 'text' : 'password';
                cppassword.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
              });
            </script>
          </div>
        </div>
        <br>
        <div class="register">

          <center>
            <p id="error5">&nbsp; Passwords should match.</p><br><input type="submit" id="submit" name="submit"
              class="btn" value="Submit">
            <p id="error6">&nbsp;Please fill the form correctly.</p><br>

        </div>
        <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
      </form>
    </div>
    </center>

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
<?php
} else {
    header('Location: login.php');
}
?>