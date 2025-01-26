<?php
 $con = mysqli_connect("localhost", "root", "", "miniproject");
 if(isset($_POST["sub"])){
    $a=$_POST["sub"];
    $qu="select * from tbl_book where book_id ='$a'";
    $r=mysqli_query($con,$qu);
    $count=mysqli_num_rows($r);
    if($count>0)
    {
        while ($row = mysqli_fetch_array($r)) {
            echo "<option name='rate' value='".$row['rate']."'>".$row['rate']." </option>";
         }          
     }
    }
?>