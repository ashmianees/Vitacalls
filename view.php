<?php 
include("dietition_dashboard.php");
   
$con=mysqli_connect("localhost","root","","miniproject");
  
         ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title> Vita Calls</title>
  <link rel="icon" href="vax.png" />
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
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
    body{
      padding-left:250px;
    }

    input[type=text],
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

    .container {
      font-size: 14px;
      width: 1000px;
      /* margin-top: 850px; */
      margin-bottom: 200px;
      margin-right: 150px;
      border-radius: 25px;
      /* background-color: #f2f2f9; */
      padding-top: 100px;
      /* overflow: scroll; */
    }

    .home-section>.container {
      padding-top: 150px;
      margin-left: 5px;
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

   

   

   

   

  

    
  

    nav .sidebar-button i {
      font-size: 35px;
      margin-right: 10px;
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

    table {
      width: 1070px;
      padding-left:20px;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    td button {
      padding: 7px 10px;
      border: none;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }

    th button {
      padding: 7px 40px;
      margin-left: 540px;
      border: none;
      font-size: 15px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }

    .view-btn {
      background-color:#55df1d;
    }

    .delete-btn {
      background-color: #f44336;
    }

    .add-btn {
      background-color: #4caf50;
    }

    .view-btn:hover,
    .delete-btn:hover,
    .add-btn:hover {
      opacity: 0.8;
    }

    b {
      font-size: 20px;
      color: #386e21;
    }
    element.style{
      padding-left:250px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <script>
    var v1 = 0;
    var v2 = 0;
    var v3 = 0;
    var v4 = 0;
    var v5 = 0;
    var v6 = 0;
    var v7 = 0;
    var v8 = 0;
    $(document).ready(function () {
      $("#error1").hide();
      $("#error2").hide();
      $("#error3").hide();
      $("#error4").hide();
      $("#error5").hide();
      $("#error6").hide();
      $("#error7").hide();
      $("#error8").hide();
      $("#exist").hide();


      var fname = /^[a-zA-Z\s]*$/;
      $("#fname").keyup(function () {
        x = document.getElementById("fname").value;
        if (fname.test(x) == false) {
          v1 = 1;
          $("#error1").show();
        }
        else if (fname.test(x) == true) {
          v1 = 0;
          $("#error1").hide();
        }
      });

      var lname = /^[a-zA-Z\s]*$/;
      $("#lname").keyup(function () {
        x = document.getElementById("lname").value;
        if (lname.test(x) == false) {
          v2 = 1;
          $("#error2").show();
        }
        else if (lname.test(x) == true) {
          v2 = 0;
          $("#error2").hide();
        }
      });

      var mob = /^[7-9][0-9]{9}$/;
      $("#mob").keyup(function () {
        x = document.getElementById("mob").value;
        if (mob.test(x) == false) {
          v4 = 1
          $("#error3").show();
        }
        else if (phoneno.test(x) == true) {
          v4 = 0
          $("#error3").hide();
        }
      });

      var mail = /^\w+([\.-]?\w+)(@gmail)+([\.-]?\w+)(\.\w{2,3})+$/;
      $("#mail").keyup(function () {
        x = document.getElementById("mail").value;
        if (mail.test(x) == false) {
          v5 = 1
          $("#error4").show();
        }
        else if (mail.test(x) == true) {
          v5 = 0
          $("#error4").hide();
        }
      });



      var house = /^(?![0-9]+$)[a-zA-Z0-9\s\,\#\-]+$/;
      $("#house").keyup(function () {
        x = document.getElementById("house").value;
        if (house.test(x) == false) {
          v5 = 1
          $("#error5").show();
        }
        else if (house.test(x) == true) {
          v5 = 0
          $("#error5").hide();
        }
      });

      $("#dist").keyup(function () {
        x = document.getElementById("dist").value;
        if (x == "") {
          v8 = 1
          $("#error8").show();
        }
        else {
          v8 = 0
          $("#error8").hide();
        }
      });


      var exp = /^([1-3][0-9]|[1-9]|4[0-5]|0[1-9])$/;
      $("#exp").keyup(function () {
        x = document.getElementById("exp").value;
        if (exp.test(x) == false) {
          v6 = 1
          $("#error6").show();
        }
        else if (exp.test(x) == true) {
          v6 = 0
          $("#error6").hide();
        }
      });

      pwd = /^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#pwd").keyup(function () {
        x1 = document.getElementById("pwd").value;
        if (pwd.test(x1) == false) {
          v7 = 1
          $("#error7").show();
        }
        else if (pwd.test(x1) == true) {
          v7 = 0;
          $("#error7").hide();
        }
      });

      $("#btn").click(function () {
        if (v1 == 0 && v2 == 0 && v3 == 0)
          $("#error6").hide();
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
      <table>
        <thead>
          <tr>
            <th colspan="4"><b>Client Details </b>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Sl.no</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          <?php 
            $i=1;
            
            if(isset($_SESSION['did']))
            {
                $did=$_SESSION['did'];
                
              $query="select * from tbl_alocation  where dietid=$did";
              $re=mysqli_query($con,$query);
      while ($row=mysqli_fetch_array($re))
      {
        $did=$row['id'];
            $query1 = "select * from tbl_register where id='$did';";
        $re1 = mysqli_query($con, $query1);

        while ($row1=mysqli_fetch_array($re1))
      {
         
        ?>
          <tr>
            <td>
              <?php echo  $i++; ?>
            </td>
            <td>
              <?php echo $row1['name'] ;?>
            </td>
            <td><a href='diet_view.php?id=<?php echo $row1['id']; ?>'> <button
                  class="view-btn">View</button></a> &nbsp;
                  <a href='daily.php?cid=<?php echo $row1['lid']; ?>'> <button
                  class="view-btn">Daily Activity</button></a>
        
            </td>
          </tr>
          <?php
      }

      }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</body>


</html>
<?php
    }
    else{
      header('Location: demo1.php');
  
    }
?>