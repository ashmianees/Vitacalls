<?php
include("dietition_dashboard.php");
if(!isset($_SESSION['did']))
{
  header('location:home.php');
}
?>
<?php
    
    // session_start();
    $did=$_SESSION['did'];
	$con=mysqli_connect("localhost","root","","miniproject");
    $query="select * from dietition_reg where status=1 and did='$did';";
    $re=mysqli_query($con,$query);
    $row=mysqli_fetch_array($re);
      
      
?>


<?php
 
	if(isset($_POST['submit']))
	{
		    
    $na = $_POST['name'];
	$ad=$_POST['lname'];
	$ph=$_POST['phone'];
		$con=mysqli_connect("localhost","root","","miniproject");
		
			$q="update dietition_reg set fname='$na', lname='$ad', mob='$ph' where did='$did'";
			$res=mysqli_query($con,$q);
			?>
<script>
  alert("Updation successful");
  window.location.href = "dietition_profile.php";
</script>

<script>
  alert("Updation failed");
</script>
<?php
			
		
		mysqli_close($con);
	}
?>
<html>
    <style>
        body {
    font-family: cursive;
    padding-left:250px;
    padding-top:106px;
}
.container {

    width: 1000px;
      padding-top: 200px;
      margin-right: 100px;
      padding-left: 100px;
      border-radius: 25px;

      background-color: #f2f2f2;

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

      width: 100%;
      box-sizing: border-box;
      padding: 5px 18px;
      margin-top: 30px;
      outline: none;
      border: none;
      background: green;
      opacity: 0.7;
      border-radius: 20px;
      font-size: 20px;
      color: #fff;
    }

    .btn:hover {
      background: orange;
      opacity: 0.7;
    }
    .login-text{
        font-size: 2rem;
         font-weight: 800;
         color:#386e21;

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
        $("#p1").keyup(function() {
          x = document.getElementById("p1").value;
          if (fname.test(x) == false) {
            v1 = 1;
            $("#error1").show();
          } else if (fname.test(x) == true) {
            v1 = 0;
            $("#error1").hide();
          }
        });

        var lname = /^[a-zA-Z\s]*$/;
        $("#p2").keyup(function() {
          x = document.getElementById("p2").value;
          if (lname.test(x) == false) {
            v2 = 1;
            $("#error2").show();
          } else if (lname.test(x) == true) {
            v2 = 0;
            $("#error2").hide();
          }
        });

        var mobch = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
        $("#p3").keyup(function() {
          x = document.getElementById("p3").value;
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
        <form action="#" method="POST" class="login-email" enctype="multipart/form-data">
          <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit Your Account</p>
          <div class="input-box">
            <input type="text" id="p1" value="<?php echo $row['fname'] ?>" name="name" required />
          </div>
          <p id="error1">&nbsp;Only letters are allowed</p><br>
          <div class="input-box">
            <input type="text" id="p2" value="<?php echo $row['lname'] ?>" name="lname" required />
          </div>
          <p id="error2">&nbsp;Only letters are allowed</p><br>


          <div class="input-box">
            <input type="text" id="p3" value="<?php echo $row['mob'] ?>" name="phone" required />
          </div>
          <p id="error3">&nbsp;Use a valid phone number</p><br>

          


          <p id="error6">&nbsp;Please fill the form correctly.</p><br>
          <div class="input-box">
            <input type="submit" name="submit" class="btn" value="Done">
          </div>

        </form>
      </div>
</body>
</html>