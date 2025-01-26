<?php
include("dashboard1.php");

$con = mysqli_connect("localhost", "root", "", "miniproject");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_password_mail($email, $pwd)
{
  require("PHPMailer/PHPMailer.php");
  require("PHPMailer/SMTP.php");
  require("PHPMailer/Exception.php");
  $mail = new PHPMailer(true);
  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
    $mail->Username   = 'ashmianees12@gmail.com';                 //SMTP username
    $mail->Password   = 'beqhajbslbdiziar';                    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
    $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('ashmianees12@gmail.com', 'Vita Calls');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'UserName and Password';
    $mail->Body    = "
                     \n Your Username and Password for Vita Calls Portal login is Provided below.\n\n\n
                     Username : $email \n
                     Password : $pwd \n\n\n
                     After Login You can update your password.";
    $mail->send();
    return true;
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
  }
}
// session_start();
if (isset($_SESSION['uid'])) {

  if (isset($_POST["sub"])) {
    $uname = $_POST["emp"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mob = $_POST["mob"];
    $mail = $_POST["mail"];
    $dist = $_POST["dist"];
    $centre = $_POST["centre"];
    $city = $_POST["city"];
      $pwd = $_POST["pwd"];
    $role = $_POST["role"];
    $exp = $_POST["exp"];
    $query1 = "insert into dietition_log(username,password,status) values('$mail','$pwd','2')";
    $re1 = mysqli_query($con, $query1);
    if ($re1) {
      $last_id = mysqli_insert_id($con);
      $query = "insert into dietition_reg(did,emp,fname,lname,mob,age,weight,assigned,role,status,exp) values('$last_id','$uname','$fname','$lname','$mob','$dist','$city','$centre','$role','1','$exp')";
      $re = mysqli_query($con, $query);

      $check_email = "SELECT username from dietition_log where username='$mail' and password='$pwd';";
      $check_email_run = mysqli_query($con, $check_email);
      if (mysqli_num_rows($check_email_run) > 0) {
          send_password_mail($mail, $pwd);
      }
    }

    header('Location: view_dietition.php');
  }

?>


  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <title> Vita Calls</title>
    <link rel="icon" href="logo1.png" />
    <meta charset="UTF-8">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      body {
    font-family: cursive;
    padding-left: 219px;
    padding-top:100px;
}
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
      input[type=password],
      select,
      textarea,
      input[type=date] {
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
      h2{
        color:#386e21;
      }

      .container {
        font-size: 14px;
        width: 1000px;
        /* margin-top: 850px; */
        margin-bottom: 200px;
        margin-right: 100px;
        border-radius: 25px;
        /* background-color: #f2f2f9; */
        padding: 44px;
        /* overflow: scroll; */
      }

      .home-section>.container {
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

      Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other
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
        background: #e31212;
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
        height: 80px;
        background: #fff;
        display: flex;
        align-items: center;
        position: fixed;
        width: calc(100% - 240px);
        left: 240px;
        z-index: 100;
        padding: 0 10px;
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

      Responsive Media Query
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
          /* overflow: hidden;
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
        } */

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

      #availability {
        color: red;
        font-family: cursive;
        font-size: 12px;
      }

      .register {
        color: white;
        padding-top: 10px;
        padding-left: 110px;
        font-size: 12px;
      }
      
      
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script>
      var v1 = 0;
      var v2 = 0;
      var v4 = 0;
      var v5 = 0;
      var v6 = 0;
      var v7 = 0;
      var v8 = 0;
      var v9 = 0;
      $(document).ready(function() {
        $("#error1").hide();
        $("#error2").hide();
        $("#error3").hide();
        $("#error4").hide();
        $("#error5").hide();
        $("#error6").hide();
        $("#error7").hide();
        $("#error8").hide();
        $("#error9").hide();
        $("#exist").hide();


        var fname = /^[a-zA-Z\s]*$/;
        $("#fname").keyup(function() {
          x = document.getElementById("fname").value;
          if (fname.test(x) == false) {
            v1 = 1;
            $("#error1").show();
          } else if (fname.test(x) == true) {
            v1 = 0;
            $("#error1").hide();
          }
        });

        var lname = /^[a-zA-Z\s]*$/;
        $("#lname").keyup(function() {
          x = document.getElementById("lname").value;
          if (lname.test(x) == false) {
            v2 = 1;
            $("#error2").show();
          } else if (lname.test(x) == true) {
            v2 = 0;
            $("#error2").hide();
          }
        });

        var mobch = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
        $("#mob").keyup(function() {
          x = document.getElementById("mob").value;
          if (mobch.test(x) == false) {
            v4 = 1
            $("#error3").show();
          } else if (mobch.test(x) == true) {
            v4 = 0
            $("#error3").hide();
          }
        });

        var mail = /^\w+([\.-]?\w+)*(@gmail)+([\.-]?\w+)*(\.\w{2,3})+$/;
        $("#mail").keyup(function() {
          x = document.getElementById("mail").value;
          if (mail.test(x) == false) {
            v5 = 1
            $("#error4").show();
          } else if (mail.test(x) == true) {
            v5 = 0
            $("#error4").hide();
          }
        });



        var house = /^(?![0-9]+$)[a-zA-Z0-9\s\,\#\-]+$/;
        $("#house").keyup(function() {
          x = document.getElementById("house").value;
          if (house.test(x) == false) {
            v6 = 1
            $("#error5").show();
          } else if (house.test(x) == true) {
            v6 = 0
            $("#error5").hide();
          }
        });

        $("#dist").keyup(function() {
          x = document.getElementById("dist").value;
          if (x == "") {
            v8 = 1
            $("#error8").show();
          } else {
            v8 = 0
            $("#error8").hide();
          }
        });


        var exp = /^([1-3][0-9]|[1-9]|4[0-5]|0[1-9])$/;
        $("#exp").keyup(function() {
          x = document.getElementById("exp").value;
          if (exp.test(x) == false) {
            v9 = 1
            $("#error6").show();
          } else if (exp.test(x) == true) {
            v9 = 0
            $("#error6").hide();
          }
        });

        pwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
        $("#pwd").keyup(function() {
          x1 = document.getElementById("pwd").value;
          if (pwd.test(x1) == false) {
            v7 = 1
            $("#error7").show();
          } else if (pwd.test(x1) == true) {
            v7 = 0;
            $("#error7").hide();
          }
        });

        $("#btn").click(function() {
          if (v1 == 0 && v2 == 0 && v4 == 0 && v5 == 0 && v6 == 0 && v7 == 0 && v8 == 0 && v9 == 0)
            $("#error9").hide();
          else {
            alert('Please Fill The Form Correctly');
            return false;
          }
        });

        $(document).on('blur', '#dist', function() {
          var na = $(this).val();
          if (na) {
            $.ajax({
              type: 'POST',
              url: 'dist_city.php',
              data: {
                'sub': na
              },
              success: function(result) {
                $('#city').html(result);
              }
            });
          } else {
            $('#city').html('<option value="">Select District First</option>');
          }
        });
      });

      function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
          url: "checkVctr.php",
          data: 'mail=' + $("#mail").val(),
          type: "POST",
          success: function(data) {
            $("#availability").html(data);
            if (data.indexOf("Already Existed") !== -1) {
              $('.btn').prop('disabled', true);
            } else {
              $('.btn').prop('disabled', false);
            }
          },
          error: function() {
            $('.btn').prop('disabled', false);
          }
        });
      }
    </script>

  </head>

  <body>
    
      <div class="container">
        <form method="POST">
          <h2> Add DIETITION</h2>
          <div class="row">
            <div class="col-25">
              <label for="emp">User ID</label>
            </div>
            <div class="col-75">
 <input type="text" id="emp" name="emp" value="<?php echo  $unique_id = 'emp-' . sprintf('%04d', mt_rand(1, 999)); ?>" />
            </div>
          </div> 
          <div class="row">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Enter First Name" required />
              <span>
                <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Letters and space
                    is allowed.</b></p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="Enter Last Name " required />
              <span>
                <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Letters and space
                    is allowed.</b></p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="mob">Mobile Number</label>
            </div>
            <div class="col-75">
              <input type="text" id="mob" name="mob" placeholder="Enter Mobile Number" required />
              <span>
                <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp; Invalid Mobile
                    Number</b></p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="mail">Email ID</label>
            </div>
            <div class="col-75">
              <input type="text" id="mail" name="mail" placeholder="Enter Email ID" onkeyup="checkAvailability()" required />
              <span>
                <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp; Enter a valid
                    email id</b></p>
                <p id="availability"></p>
              </span>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-25">
              <label for="house">House Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="house" name="house" placeholder="Enter House Name" required />
              <span>
                <p id="error5"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp; Enter a valid
                    name</b></p>
              </span>
            </div>
          </div> -->
          <div class="row">
            <div class="col-25">
              <label for="dist">Age Assigned</label>
            </div>
            <div class="col-75">
              <select name="dist" id="dist" required>
                <option value="" disabled selected>---- Choose Age Between ----</option>
                <option value="20-39">20-39</option>
    <option value="40-59">40-59</option>
    <option value="60-79">60-79</option>
    

              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="city">Weight Assigned</label>
            </div>
            <div class="col-75">
              <select name="city" id="city" required>
                <option value="" disabled selected>---- Choose Weight Between ----</option>
                <option value="Healthy weight">Healthy weight</option>
                <option value="Underweight">Underweight</option>
                <option value="Overweight">Overweight</option>
  
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="centre">Diet Assigned</label>
            </div>
            <div class="col-75">
              <select name="centre" id="centre" required>
               <option value="" disabled selected>---- Choose Diet ----</option>   
               <option value="Weight Gain">Weight Gain</option>
               <option value="Weight Loss">Weight Loss</option>
               <option value="Diet Management">Diet Management</option>
               <option value="Cholesterol Management"> Cholesterol Management</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="exp">Experience(in Years)</label>
            </div>
            <div class="col-75">
              <input type="text" id="exp" name="exp" placeholder="Number of expereince" required />
              <span>
                <p id="error6"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Invalid
                    Input.Numbers are allowed</b></p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="pwd">Enter Password</label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="pwd" placeholder="Enter Password" required />
              <span>
                <p id="error7"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp; minimum 8
                    characters like letters,digits and one special character</b></p>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="centre">Role Assigned</label>
            </div>
            <div class="col-75">
              <select name="role" id="role" required>
                <option value="" disabled selected>---- Choose Role ----</option>
                <option value="Nutrition Coach">Nutrition Coach</option>
                <option value="Diabetes Educator">Diabetes Educator</option>
                <option value="Registered Dietition">Registered Dietition</option>

              </select>
            </div>
          </div>
          <div class="row">
            <br>
            <input type="submit" class="btn" name="sub" value="Submit" />
          </div>
        </form>
      </div>
      </div>
    </section>
  </body>
 

  </html>
<?php

} else {
  header('Location: demo1.php');
}
?>