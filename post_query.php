<?php
    include("dietition_dashboard.php");

  if (isset($_POST['sub'])) {
	
    $na = $_POST['name'];
    $de = $_POST['description'];
   
    
    $con = mysqli_connect("localhost", "root", "", "miniproject");

    $query = "insert into tbl_book(month,rate) values('$na','$de')";
    $re = mysqli_query($con, $query);
    if ($re) {
        
  ?>
        <script>
          alert("registration successful");	
             window.location.href='amount_view.php';
        </script>
        <?php
      } else {
      ?>
        <script>
          alert("registration failed");
        </script>
  <?php
      }
    }
   
  ?>

<!DOCTYPE html>

<head>
  <title> Vita Calls</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-image: url("cosmetic.jpg");
      background-size: 1650px 900px;
      align-items: center;
      background-repeat: no-repeat;
    }

    .container {
      margin: 10px;
      width: 628px;
      background: 787878;
      border-radius: 6px;
      margin-top: 100px;
      margin-left: 179px;
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

     .topic-text {
      font-size: 23px;
      font-weight: 600;
      color: #386e21;
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
      background: #d2f8d1;
      border-radius: 6px;
      padding: 0 15px;
    }

    .right-side .message-box {
      min-height: 100px;
    }

    .right-side .input-box textarea {
      padding-top: 6px;
    }

    .right-side .button {
      display: inline-block;
      margin-top: 12px;
    }

    .btn {
      background-color:#55df1d;
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
    .sidebar {
  min-height: 700px;
  margin-top:-20px;
  height:620px;
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
img {
    overflow-clip-margin: content-box;
    overflow: clip;
}
  </style>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <script>
    var v1 = 0;
    var v2 = 0;
    
	
    $(document).ready(function() {
      $("#error1").hide();
      $("#error2").hide();
     
	    var name = /^(?![0-9]+$)[a-zA-Z0-9\s\,\#\-]+$/;
      $("#p1").keyup(function() {
        x = document.getElementById("p1").value;
        if (add.test(x) == false) {
          v1 = 1
          $("#error1").show();
        } else if (add.test(x) == true) {
          v1 = 0;
          $("#error1").hide();
        }
      });

      
	    var des = /^[0-9]+$/;
      $("#p2").keyup(function() {
        x = document.getElementById("p2").value;
        if (add.test(x) == false) {
          v2 = 1
          $("#error2").show();
        } else if (add.test(x) == true) {
          v2 = 0;
          $("#error2").hide();
        }
      });
	  
	  
      $(".btn").click(function() {
        if (v1 == 0  && v2 == 0 )
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
  <div class="content">

  <div class="container">
    <!-- <div class="content"> -->
      <div class="right-side">
        <div class="topic-text">Diet Plan </div><br>
        <form id="form" method="post" enctype="multipart/form-data">
          <div>
            
			<div class="input-box">
              <input type="text" placeholder="Enter Product Name" name="name" id="p1" required />
              <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br><br><br>
            </div>    
            
            <div class="input-box">
              <input type="text" placeholder="Enter Description" name="description" id="p2" required />
              <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br><br><br>
            </div>
            <div class="button">
              <input type="submit" class="btn" name="sub" value="submit" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  </div>
 
</body>

</html>