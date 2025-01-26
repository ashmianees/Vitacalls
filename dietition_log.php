<?php
session_start();

		
$con=mysqli_connect("localhost","root","","miniproject");

	if(isset($_POST["sub"]))
	{
		$user = $_POST['username'];
		$psw=$_POST['password'];
   
		 
		$query="select * from dietition_log where username='$user' and password='$psw';";
		$re=mysqli_query($con,$query);
		$row=mysqli_fetch_array($re);
		$count=mysqli_num_rows($re);
		if($count>0)
		{
				$dietid=$row['did'];
				$_SESSION['did']=$dietid;
     			echo"<script>window.location.href='dietition_dashboard.php';</script>";

		}
   
		else
		{
			?>
			<script>
					alert("Username and password does not match");
			</script>
			<?php
		}
		
		mysqli_close($con);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
/* Reset styles */
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	font-family: 'Poppins', sans-serif;
	background-color: #add46e;
}

/* Login wrapper */
.login-wrapper {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
}

/* Login box */
.login-box {
	background-color: #fff;
	padding: 50px;
	border-radius: 10px;
	box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
	text-align: center;
	position: relative;
}

/* Profile image */
.profile-image {
	background-image: url("https://img.icons8.com/bubbles/100/000000/user.png");
	background-size: cover;
	background-position: center;
	width: 120px;
	height: 120px;
	border-radius: 50%;
	border: 5px solid #fff;
	position: absolute;
	top: -60px;
	left: calc(50% - 60px);
	animation: pulse 2s linear infinite;
}

/* Pulse animation */
@keyframes pulse {
	0% {
		transform: scale(1);
	}

	50% {
		transform: scale(1.2);
	}

	100% {
		transform: scale(1);
	}
}

/* Login box title */
.login-box h1 {
	font-size: 36px;
	font-weight: 600;
	color: #333;
	margin-bottom: 30px;
}

/* Login form */
.login-box form {
	display: flex;
	flex-direction: column;
	align-items: center;
}

/* Form label */
.login-box form label {
	font-size: 18px;
	font-weight: 600;
	color: #333;
	margin-bottom: 10px;
	text-align: left;
}

/* Form input */
.login-box form input[type="text"],
.login-box form input[type="password"] {
	width: 100%;
	padding: 15px;
	font-size: 16px;
	border-radius: 5px;
	border: none;
	background-color:#d2f8d1;
	margin-bottom: 20px;
}

/* Form button */
.login-box form button[type="submit"] {
	background-color: #55df1d;
	color: #fff;
	border: none;
	border-radius: 5px;
	padding: 15px 50px;
	font-size: 18px;
	font-weight: 600;
	cursor: pointer;
	transition: all 0.3s ease-in-out;
}


        </style>
        </head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
	var v1=0;
	var v2=0;
	var v3=0;
        $(document).ready(function () {
            $("#error1").hide();
            $("#error2").hide();
            $("#error3").hide();

            var username =  /^\w+([\.-]?\w+)*(@gmail)+([\.-]?\w+)*(\.\w{2,3})+$/;
            $("#p1").keyup(function () {
                x = document.getElementById("p1").value;
                if (name.test(x) == false) {
                     v1 = 1
                    $("#error1").show();
                }
                else if (name.test(x) == true) {
                   v1 = 0;
                    $("#error1").hide();
                }
            });
			        x  = document.getElementById("p2").value;
					y  = document.getElementById("p3").value;
					
			   password= /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
               $("#p2").keyup(function () {
                x1 = document.getElementById("p2").value;
                if (psw1.test(x1) == false) {
                     v2 = 1
                    $("#error2").show();
                }
                else if (psw1.test(x1) == true) {
                   v2 = 0;
                    $("#error2").hide();
                }
            });
            $(".btn").click(function () {
                if (v1==0 && v2==0 )
                    $("#error3").hide();
                else
				{
                   alert('Please Fill The Form Correctly');
					return false;
					}
            });
        });
    </script>

<body>
	<div class="login-wrapper">
		<div class="login-box">
			<div class="profile-image"></div>
			<h1>Vita Calls</h1>
			<form method="POST">
				<label for="username">Username:</label>
				<input type="text" id="p1" placeholder="Enter Your Username" name="username" required>
                <p id="error1"><b style='font-family:cursive; font-size:12px; color:green;'> &nbsp;&nbsp;Invalid Password</p><br>
				<label for="password">Password:</label>
				<input type="password" id="p2" placeholder="Enter Your Password" name="password" required>
                <p id="error2"><b style='font-family:cursive; font-size:12px; color:green;'> &nbsp;&nbsp;Invalid Password</p><br><br>
				<button type="submit" class="btn" name="sub" value="sub">Login</button>
			</form>
			
		</div>
	</div>
</body>
</html>
