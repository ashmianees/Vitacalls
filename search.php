<?php include 'dashboard1.php';
//session_start();
if(!isset($_SESSION['uid']))
{
    //header('location: ../ index.php');
    echo "<script>window.location.href='../index.php'</script>";
    
}
else{
   ?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<style>
    body {
        margin-top: 20px;
        background: #f6f9fc;
        background-image: url(blood.jpg);
    }

    .account-block {
        padding: 0;
        background-image: url(ba.jfif);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        position: relative;
    }

    span {
    font-size: 18px;
}
    .account-block .overlay {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .account-block .account-testimonial {
        text-align: center;
        color: #fff;
        position: absolute;
        margin: 0 auto;
        padding: 0 1.75rem;
        bottom: 3rem;
        left: 0;
        right: 0;
    }

    .text-theme {
        color: #5369f8 !important;
    }

    .btn-theme {
        background-color: #5369f8;
        border-color: #5369f8;
        color: #fff;
    }
    .user-box
    {
        padding-top:20px;
    }
    
.mt-5 {
    margin-top: 13rem!important;
}
</style>

<body>
<center>
<div class="col-xl-5 ml-5 mt-5  ">
    <div class="card border-2" style="  background-color:rgb(255, 229, 229) ">
    
        <h2 class="mt-2">Check Complaints</h2>
        <form action="search_action.php" method="POST">
            <div class="user-box ">
            <label class="float-left ml-5 px=5">Enter Name</label>
            <select name="search" class="form-control ml-3  col-xl-5 " required>
            <!-- <select name="search" class="form-control ml-3  col-xl-5 " required> -->
                                                <?php
                                     $con= mysqli_connect("localhost", "root", "", "miniproject");
                                    $query="SELECT tbl_register.name, activity.amount_of_cal, activity.time_at, activity.date,activity.images
                                    FROM tbl_register 
                                    JOIN activity ON tbl_register.lid = activity.id";
                                   $result= mysqli_query($con, $query);
                                   while($row=mysqli_fetch_array($result))
                                   {
                                    echo"<option>",$row['name'],"</options>";
                                   }
                                   ?>
                                    </select>
            </div>
           
            </div>
           
          
            <button type="submit" class="btn btn-theme mb-5" name="submit" onclick="datausername()">search</button>
        </form>
        
    </div>
      
</div>
    </center>

    <!-- <div id="main-wrapper" class="container" style="margin-top:100px ">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme"></h3>
                                    </div>
                                    <div class="col-lg-6 card border-2 "  >


                                    <p class="text-muted mt-2 mb-5 p-2">Select bloodgroup to search </p>

                                    <form method="POST" action="search_action.php">
                                        <div class="form-group">
                                            <label>Enter the bloodgroup </label>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-theme mb-5" name="submit" onclick="datausername()">search</button>
                                         <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a> -->
                                    <!-- </form>
                                </div>
                                </div>  -->
</body>
</html>
<?php
 }
//  else {
//     header('Location: ../index.php');
// //     echo "<script>window.location.href='../index.php'</script>";
//  }
?>