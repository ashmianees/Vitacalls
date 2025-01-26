<?php
session_start();

	if(isset($_POST['sub']))
	{
		$un = $_POST['user'];
		$ps=$_POST['pass1'];
    $an="ashmianees12@gmail.com";
		$as="Ashmi@2002";
		if($un==$an && $ps==$as)
		{
			echo"<script>window.location.href='main.php';	</script>";
		}
		
		$con=mysqli_connect("localhost","root","","miniproject");
		 
		$query="select * from tbl_login where username='$un' and password='$ps'";
		$re=mysqli_query($con,$query);
		$row=mysqli_fetch_array($re);
		$count=mysqli_num_rows($re);
		if($count>0 && $row['status']==0)
		{
				$id=$row['lid'];
				$_SESSION['uid']=$id;
        // $_SESSION['logout']="yes";
				echo"<script>window.location.href='receipe_view.php';	</script>";

		}
    elseif($count>0 && $row['status']==1)
    {
      ?>
			<script>
					alert("Please wait  for confirmation");
			</script>
			<?php
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

<head>
  <title>Vita Calls</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-image: url("query.jpg");
      background-size: 1650px 900px;
      align-items: center;
      background-repeat: no-repeat;
    }

    .login-box h1 {
	font-size: 36px;
	font-weight: 600;
	color: #333;
	margin-bottom: 30px;
}
    .container {
      margin: 100px;
      width: 628px;
      background: 787878;
      border-radius: 6px;
      margin-top: 116px;
      margin-left: 400px;
      padding: 82px 65px 30px 40px;
      box-shadow: -10px 10px 10px 10px rgba(0, 0, 0, 0.2);
    }

    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
      margin-left: 75px;
    }

    .content .right-side .topic-text {
      font-size: 23px;
      font-weight: 600;
      color: Blue;
    }

    .right-side .input-box {
      height: 50px;
      width: 100%;
      margin: 20px 0;
    }

    .right-side .input-box input,
    .right-side .input-box textarea {
      height: 100%;
      width: 100%;
      border: none;
      outline: none;
      font-size: 16px;
      background: #DDD1F8;
      border-radius: 6px;
      padding: 0 15px;
    }

    .right-side .message-box {
      min-height: 110px;
    }

    .right-side .input-box textarea {
      padding-top: 6px;
    }

    .right-side .button {
      display: inline-block;
      margin-top: 12px;
    }

    .btn {
      background-color: #DDD1F8;
      color: rgb(0, 0, 0);
      border: 2px solid black;
      padding: 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 4px;
      cursor: pointer;
      border-radius: 10px;
      width: 100%;
    }
    .forgt{
      font-size: 20px;
    font-weight: 600;
      text-align: center; 
      color:#0000ff;
    }
    .register{
      font-size: 20px;
    font-weight: 600;
    text-align: center;
    color:#0000ff;
    }
  </style>
 
  

   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
	var v1=0;
	var v2=0;
	var v3=0;
        $(document).ready(function () {
            $("#error1").hide();
            $("#error2").hide();
            $("#error3").hide();

            var user =  /^\w+([\.-]?\w+)*(@gmail)+([\.-]?\w+)*(\.\w{2,3})+$/;
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
					
			   psw1= /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
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
   </head>
<body>

  <div class="container">
    <div class="content">
      <div class="right-side">
      <h1>Vita Calls</h1>
        <div class="topic-text">LOGIN</div><br>
      <form  id="form"  method="post">
        <div class="input-box">
          <input type="text" placeholder="Enter User Name" name="user" id="p1" required/>
		  <p id="error1" ><b style='font-family:cursive; font-size:12px; color:green;'> &nbsp;&nbsp;Invalid User Name</p><br>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Enter Password" name="pass1" id="p2" required/>
		  <p id="error2"><b style='font-family:cursive; font-size:12px; color:green;'> &nbsp;&nbsp;Invalid Password</p><br>
        </div>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="submit"/>
        </div>
		<div class="register">
		&nbsp;&nbsp;<a href="register.php">I Have No Account </a>
    <div class="forgt">
		&nbsp;&nbsp;<a href="forgot_password.php">Forgot Paas </a>
		</div>
		</div>
	  </form>
    </div>
    </div>
    </div>
    
    </body>
    </html>
