<?php
//  session_start();
//  $id=$_SESSION['uid'];
 include("dashboard1.php");

$con = mysqli_connect("localhost", "root", "", "miniproject");
$sql = "SELECT tbl_register.name, activity.amount_of_cal,activity.time_at,activity.date
        FROM tbl_register 
        JOIN activity ON tbl_register.lid = activity.id";

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
				<th>Si.No</th>
                <th>Name</th>
				<th>Amount Of Calorie</th>
				<th>Time</th>
        <th>Date</th>
			</tr>
			
			<?php
      // Execute query
$result = $con->query($sql);

// Check if there are any rows returned
if ($result) {
    // Output data of each row
    $active_id= 0;
    while($row = mysqli_fetch_array($result)) {
      $active_id++;
        // Access data using column names
        ?>
        <tr>
        <td> <?php echo  $active_id ?> </td>
        <td><img src="./images/ <?php echo $row['images']?>" height="100" weight="100"/></td>
        <td> <?php echo $row["amount_of_cal"] ?></td>
        <td><?php echo $row["time_at"] ?></td>
        <td>  <?php  $row["date"] ?></td>
      </tr><br>";
 <?php   }
} else {
    echo "0 results";
}

// Close connection
$con->close();

?>
	
			</div>
   </table>
	
 </body>
</html>