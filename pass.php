<!----To Check Password----->
<?php
session_start();
$did = $_SESSION['uid'];
$con = mysqli_connect("localhost", "root", "", "miniproject");
$query = "select * from dietition_log where did='$did'";
$re = mysqli_query($con, $query);
$row = mysqli_fetch_array($re);
 if(isset($_POST['pass']) && $_POST['pass']!="") {
     if ($re) {
         if ($_POST['pass'] == $row['password']) {
            echo "<script>var ver7=0;</script>";
         }
         else{
            echo "<span class='error'> &nbsp;&nbsp;Password does not match</span>
            <script>var ver7=1;</script>";
         }
     }
 }
$con->close();
ob_end_flush();
?>
<html>

<head>
    <style>
        .error {

            color: #cc0033;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: bold;
            line-height: 20px;
            text-shadow: 1px 1px rgba(250, 250, 250, .3);
        }
</style>
</head>
</body>
</html>