
<?php
session_start();
if(isset($_GET['amount'])){ 
// $d=$_SESSION['amount'];
$d=$_GET['amount'];
$lid=$_SESSION['uid'];



$connect = mysqli_connect("localhost", "root", "", "miniproject"); 
if(isset($_POST['pay_id']))
{
 $a=$_POST['pay_id'];
$query = "INSERT INTO `tbl_payment`( `transaction_id`, `book_id`,`amount`) VALUES('$a','$lid','$d')";  
//$query1 = "update booking set payment='Success' where booking_id='$b'";
//$query = "SELECT start,end from booking WHERE booking_id='$id'";
//$result1 = mysqli_query($connect, $query1);
$result = mysqli_query($connect, $query);
}
}
?>