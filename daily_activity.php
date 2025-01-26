<?php
//  session_start();
//  $id=$_SESSION['uid'];
 include("dietition_dashboard.php");
$con = mysqli_connect("localhost","root","","miniproject");
if(isset($_SESSION['did']))
{
    $lid=$_SESSION['did'];
}
$sql = "SELECT * from tbl_alocation where dietid='$lid';";
$rslt=mysqli_query($con,$sql);
$row=mysqli_fetch_array($rslt);
$lid1=$row['id'];
$sql1 = "SELECT * from tbl_register where id='$lid1'";
$rslt1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($rslt1);
$id=$row1['lid'];

?>
<!doctype html>
<html>
<head>
<style>
body{
     margin:100px;
	 font-family:system-ui;
	}
	

i{
  font-size:20px;
  margin:0 10px 0 0;
 }
 button{
	   background:transparent;
	   position:center;
	   border:none;
	   outline:none;
      }


#form1{
     background-color:plum;
     text-align: center;
     padding: 20px 20px 20px 20px;
	 width:90%;
	 
			  margin:25px;
			  border:1px solid #184d47;
			  border-radius:50px 50px 50px 50px;
			  color:white;
    }
label {    
  padding: 12px 12px 12px 12px;    
  display: inline-block;    
}   
input[type=submit] {    
  background-color: rgb(37, 116, 161);    
  color: white;    
  padding: 12px 20px;    
  border: none;    
  border-radius: 4px;    
  cursor: pointer;    
  float: right;    
}    
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
    
.row:after {    
  content: "";    
  display: table;    
  clear: both;    
}  
input[type=submit] {
                     background-color: black ;
                     color: white;
                     padding: 20px 20px;
                     border: none;
                     cursor: pointer;
}  
input[type=submit]:hover {    
  background-color: #A29ADE  ;    
}
#fname,textarea{
	width: 97%;    
  padding: 12px;    
  border: 1px solid rgb(70, 68, 68);    
  border-radius: 4px;    
  resize: vertical; 
}
#email , textarea {    
  width: 97%;    
  padding: 12px;    
  border: 1px solid rgb(70, 68, 68);    
  border-radius: 4px;    
  resize: vertical;    
}    
.page-title1{
	        background:rgba(0,0,0,0.5);
			text-align:center;
			color:white;
			padding:20px;
			font-size:0.5px;
			font-family:fantasy;
			letter-spacing:10%;
           }
img{

	height:100px;
width: 100px;
align:center;
padding-left:-20px;
padding-bottom:10px;

padding-top:10px;
}
td{
	height:100px;
width: 100px;
align:center;

}
th{
  color:green;
}
		  </style>

 </script>
</head>
 <body>

 		</form>

	<div>
    <table border="1" align="center" width="900" height="200">
		<tr>
				<th>Sl.No</th>
                <th>Name</th>
				<th>Amount Of Calorie</th>
				<th>Time</th>
        <th>Date</th>
			</tr>
        <?php
        $sql2 = "SELECT * from activity where id='$id'";
        $rslt2=mysqli_query($con,$sql2);        
        $i=1;
       while($row2=mysqli_fetch_array($rslt2)) 
       {
        
        $i++;
        // Access data using column names
        echo "<tr>
        <td>", $i,
       " </td><td><img  src='images/".$row['images']."'/></td><td>  " . $row["amount_of_cal"]. "</td><td>  " . $row["time_at"]."</td><td>  " . $row["date"].  "</td></tr><br>";
    }
        ?>

			</div>
   </table>
	
 </body>
</html>