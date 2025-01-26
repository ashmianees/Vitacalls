<?php

 include("dashboard1.php");
$con = mysqli_connect("localhost", "root", "", "miniproject");
$query = "select * from cart_systm ";
$res = mysqli_query($con, $query);
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
		   .active{
  text-decoration:none;
  color:white;
  background-color:#55df1d;
  width:40px;
  height:30px;
  padding:5px;
}
.deactive{
  text-decoration:none;
  color:white;
  background-color:red;
  width:40px;
  height:30px;
  padding:5px;
}
img{

	height:100px;
width: 100px;
align:center;
padding-left:-32px;
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
				<th>Image</th>
				<th>Description</th>
				
				<th colspan="2">Action</th>
			</tr>
			
			<?php
				
			$pid = 0;
			while ($row = mysqli_fetch_array($res)) {
				$pid++;
				echo "<tr>
				<td>", $pid,
				"</td><td>", $row['name'],
				
				"<td> <img  src='images/".$row['images']."'/></td>
			
				<td>", $row['description'],
				"<td>";
				
				if($row['status']==0){
					 echo "<a class='active' href='receipes_dlt.php?id=",$row['pid'],"'>Activated</a>";
				}
				else{
				  echo "<a class='deactive' href='receipes_dlt.php?id=",$row['pid'],"'>Deactivated</a>";
				}
				echo"</td></tr>";
			  }
			


			mysqli_close($con);
			?>
			</div>
   </table>
	
 </body>
</html>