<?php
  $pid=$_GET['id'];
  $con=mysqli_connect('localhost','root','','miniproject');
  $query="select * from cart_systm where pid='$pid'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['status']==0){
      $que="update cart_systm set status='1' where pid='$pid'";
      
      $res=mysqli_query($con,$que);
     
      
      if($res ){
        header("location:healthy.php");
        }
  }
  elseif($row['status']==1){
    $que="update cart_systm set status='0' where pid='$pid'";
      
    $res=mysqli_query($con,$que);
    
    
    if($res ){
      header("location:healthy.php");
      }
  }
?>