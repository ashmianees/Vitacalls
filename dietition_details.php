<?php
// session_start();
include("dashboard1.php");
if(isset($_SESSION['uid']))
    {
    $did= $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "miniproject");
  $query = "select * from dietition_reg where status=1 and did='$did';";
  $re = mysqli_query($con, $query);
  $row = mysqli_fetch_array($re);
  
  $query1 = "select * from dietition_log where status=2 and did='$did';";
  $re1 = mysqli_query($con, $query1);
  $row1 = mysqli_fetch_array($re1);
  

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- <title> VAX-FARE</title>
  <link rel="icon" href="vax.png" /> -->
  <meta charset="UTF-8">
  
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    .container {
      font-size: 14px;
      width: 1000px;
      /* margin-top: 850px; */
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      padding: 72px;
    }
    .home-section>.container {
      padding-top: 100px;
      margin-left: 5px;
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
      margin-top: -50px;
      color: Blue;
    }

    .register {
      color: white;
      padding-top: 10px;
      padding-left: 110px;
      font-size: 12px;
    }

    table {

      background-color: #d2f8d1;
      border-radius: 12px;
      width: 1070px;
      padding-left: 20px;
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
      margin-left: 710px;
      border: none;
      font-size: 15px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }

    .add-btn {
      background-color: #55df1d;
    }

    .view-btn:hover,
    .delete-btn:hover,
    .add-btn:hover {
      opacity: 0.8;
    }

    th,
    td {
      font-weight: bold;
      font-size: 15px;
    }

    b {
      font-size: 20px;
      color: green;
    }

    .bx bxs-user-circle {
      size: 200px;
    }
    body{
      padding-left:250px;
    }
  </style>
</head>

<body>

  <!-- <div class="sidebar">
    <div class="logo-details">
      &nbsp &nbsp <span class="logo_name"><img src="vax.png" height="50" width="50" /></span> &nbsp
      <i>VaX-FarE</i>
    </div> -->
   

    <div class="container">
      <table>
      <tr>
          <th colspan="5"> <i class='bx bxs-map-pin'> <b>
                <?php echo $row['emp']; ?>
              </b></i> <a href="view_dietition.php"><button class="add-btn"> &nbsp;<i class='bx bx-arrow-back'> Back
                </i></button></a></th>
        </tr>
        <BR><BR>
       
        </tr>
        <tr>
          <th> First Name: </th>
          <td>
            <?php echo $row['fname'] ?>
          </td>
        </tr>
        <tr>
          <th> Last Name: </th>
          <td>
            <?php echo $row['lname'] ?>
          </td>
        </tr>
        <tr>
          <th>Mobile: </th>
          <td>
            <?php echo $row['mob'] ?>
          </td>
        </tr>
        <tr>
          <th>Age Assigned Between: </th>
          <td>
            <?php echo $row['age'] ?>
          </td>
        </tr>
        <tr>
          <th>Weight Assigned Between:</th>
          <td>
            <?php echo $row['weight'] ?>
          </td>
        </tr>
        <tr>
          <th>Assigned Duty:</th>
          <td>
            <?php echo $row['assigned'] ?>
          </td>
        </tr>
        <tr>
          <th>Role:</th>
          <td>
            <?php echo $row['role'] ?>
          </td>
        </tr>
        <tr>
          <th>Experience:</th>
          <td>
            <?php echo $row['exp'] ?>
          </td>
        </tr>
        <tr>
          <th>UserName:</th>
          <td>
            <?php echo $row1['username'] ?>
          </td>
        </tr>
        <tr>
          <th>Password: </th>
          
          <td>
            <?php echo $row1['password'] ?>
          
            </td>
            
        </tr>
        <tr>
          <th>        </th>
        
  </tr>
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
