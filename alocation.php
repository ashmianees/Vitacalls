<?php
include("dashboard1.php");

if(!isset($_SESSION['uid']))
{
  header('location:home.php');
}
?>
<?php
  if (isset($_POST['sub'])) {

   
    $ma = $_POST['user'];
	$ad=$_POST['diet'];


// $did= $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "miniproject");


  $q = "insert into tbl_alocation(id,dietid) values('$ma','$ad')";
  $res = mysqli_query($con, $q);

// $query1 = "select * from dietition_log where status=2 and did='$did';";
// $re1 = mysqli_query($con, $query1);
// $row1 = mysqli_fetch_array($re1);

}

?>

<!DOCTYPE html>

<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->

<html lang="en" dir="ltr">

<head>

  <title> vitacalls</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
    integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <link rel="icon" href="logo1.png" />

  <meta charset="UTF-8">

  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->

  <!-- Boxicons CDN Link -->

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    /* Googlefont Poppins CDN Link */

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



    input[type=text],
    select,
    textarea {

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

      background-color: #04AA6D;

      color: #d2f8d1;

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

      width: 700px;

      margin-top: 100px;

      margin-left:   150px;

      border-radius: 25px;

      background-color: #f2f2f2;

      padding: 20px;

    }



    .col-25 {

      float: left;

      width: 25%;

      margin-top: 6px;

    }






    .register {

      color: white;

      padding-top: 10px;

      padding-left: 110px;

      font-size: 12px;

    }

    body,
    h1,
    h3,
    input {
      padding: 100px;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
    }

   
    form {
      width: 86%;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
      background: #ebebeb;
    }

    .info-item {
      width: 100%;
    }

    input {
      width: calc(100% - 57px);
      height: 36px;
      padding-left: 10px;
      margin: 0 0 12px -5px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
      background: #fff;
    }

    .icon {
      padding: 9px 15px;
      margin-top: -1px;
      border-radius: 5px 0 0 5px;
      border: solid 0px #cbc9c9;
      background: #666;
      color: #fff;
    }

    input[type=radio] {
      display: none;
    }

    label.radio {
      position: relative;
      display: inline-block;
      text-indent: 32px;
      cursor: pointer;
    }

    label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 0.5px solid #8ebf42;
      background: #fff;
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
    /* .form-control
    {
      color:#cbc9c9;
    } */
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
  </script>

</head>

<body>


    <!-- </nav>
  </section> -->
<!-- <script>

$(document).on('blur','#state', function(){
                    var na = $(this).val();
                    if(na){
                        $.ajax({
                            type:'POST',
                            url:'assign.php',
                            data:{'sub':na},
                            success:function(result){
                                $('#district').html(result);
                            }
                        }); 
                    }
                    else{
                        $('#district').html('<option value="">Select State First</option>');
                    }
                });

</script> -->
<script>

let sidebar = document.querySelector(".sidebar");

let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {

  sidebar.classList.toggle("active");

  if (sidebar.classList.contains("active")) {

    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");

  } else

    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");

}
</script>
<form method="POST">
<div class="container">
<div class="form-group">
    
    <label class="mb-2">Select user</label>
    <select name="user" class="form-control"  id="user"required>
        <?php
        $con= mysqli_connect("localhost", "root", "", "miniproject");
        $query="SELECT tbl_register.name, query.id
        FROM tbl_register 
        JOIN query ON tbl_register.id = query.id";
        $result= mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <option value="<?php echo $row['id'];?>">
        <?php echo $row['name'];?>
    </option>;
    <?php
        }
        ?>

    </select>
</div>

<div class="form-group">
    <label class="mb-2"> Select Experts</label>

    <select name="diet" class="form-control" id="diet" required>
        <?php
        $con= mysqli_connect("localhost", "root", "", "miniproject");
        $query="select * from dietition_reg";
        $result= mysqli_query($con,$query);
        while($row1=mysqli_fetch_array($result))
        {
          $did=$row1["did"];
          ?>
        <option value="<?php echo $did;?>">
        
        <?php echo $row1['fname'];?> <?php echo $row1['lname'];?>
        
    </option>;

        <?php
        }
        ?>

    </select>
</div>
                                       
                                        
<button type="submit" class="btn" name="sub">submit</button>
        
</div>
      </form>
</html>

 
