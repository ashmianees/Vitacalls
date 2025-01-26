<?php 
include("dashboard1.php");
// session_start();
if(!isset($_SESSION['uid']))
{
    
     header('location: ../index.php');
    // echo "<script>window.location.href='../index.php'</script>";
    
}

else{
    echo $_SESSION['uid'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            body {
    font-family: cursive;
    padding-left: 303px;
}
            .card-body{
                margin-top: 13rem!important;
            }
            .card{
                padding-right:20px;
            }
            form {
    display: block;
    margin-right:20px;
}
            </style>
</head>
<body>

    <div class="d-flex ">
    <?php   
$con = mysqli_connect("localhost", "root", "", "miniproject");
if(isset($_POST['submit']))
{
 $sr = $_POST['search'];  
 $q = "SELECT tbl_register.name, activity.amount_of_cal, activity.time_at, activity.date,activity.images
 FROM tbl_register 
 JOIN activity ON tbl_register.lid = activity.id";
 $result = mysqli_query($con, $q);
 if($result)
 {
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
?>
<form method="POST" class="m-5 ms-5 ps-5 d-flex">
    <div class="card" style="width: 18rem;">
    
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
        <i class="bi bi-people"></i>
           
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name:   <?php echo $row['name'];?></li>
            <li class="list-group-item">food Time:    <?php echo $row['amount_of_cal'];?></li>
          
            <li class="list-group-item">Food:    <img src="./images/<?php echo $row['images'] ?>" height="100" weight="100" /></li>
            <li class="list-group-item">Time:       <?php echo $row['time_at'];?></li>
            <li class="list-group-item">Date:    <?php echo $row['date'];?></li>

        </ul>
        <!-- <div class="card-body">
            <a href="request.php">
        <button type="button" name="submit" value="Request" class="btn btn-danger">Request</button></a>
        </div> -->
    </div>
    
    </form>
<?php
    }
}
    else{
        echo '<h2 class="text-danger">Data not found</h2>';
        exit();
    }
}
?>
</div>
</body>
<?php 
}
?> 

</html>