
<?php
 $con = mysqli_connect("localhost", "root", "", "minproject");
 if(isset($_POST["sub"])){
    $a=$_POST["sub"];
    $qu="select * from tbl_register where id='$a'";
    $r=mysqli_query($con,$qu);
    $count=mysqli_num_rows($r);
    if($count>0)
    {
        while ($row = mysqli_fetch_array($r)) {
            echo "<option name='district' value='".$row['id']."'>".$row['diet']." </option>";
         }          
     }
    }
?>