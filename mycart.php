<?php
    session_start();
    $pid=$_GET['pid'];  
    $id=$_SESSION['uid']; 
				$con=mysqli_connect("localhost","root","","miniproject");
				$qry="select * from tbl_fav where pid=21 and lid=42;";
				 $res1=mysqli_query($con,$qry);
                  
    
?>

<!DOCTYPE html>
  <head>
    <title> vitacalls </title>
	<link rel="icon" href="logo1.png" />	
  <style>

  		#image
		{
		height:700px;
		width:1330px;
		}
		
	.third
	{
	margin-top:2000px;
	padding-top:10px;
	background: rgba(213, 184, 255, 0.8);
	}
	#new{
	 padding-left:500px;
	   font-family: "Snell Roundhand", cursive;
       	 font-size:20px;
        color:purple;		 
	}
	.last
	{
	font-family:Times New Roman;
	font-size:16px;
    color:black;
	}
	#pro
		{
		margin-bottom:0px;
		padding-left:500px;
		height:50px;
		 width:50px;
		}
		.c1
		{
		height:20px;
		width:20px;
		padding-left:20px;
		}
	#second
		{
		padding-left:670px;
		font-size:20px;
		}
		
.first
		{
		    position:static;
		  padding-left:200px;
		  font-family: "Times New Roman", Times, serif;
		}
#img
		{
			padding-left:100px;
		padding-top:10px;
		 height:45px;
		 padding-right:380px;
		}
#img1
		{ 
		 height:28px;
		}
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
 background-image: white;
  background-size: 1500px 900px;
align-items: center;
background-repeat: no-repeat;
}
.container{
   margin:100px;
  width: 900px;
  background:787878;
  border-radius: 6px;
  margin-top:116px;
  margin-left:250px;
  padding: 82px 65px 30px 40px;
  box-shadow: -10px 10px 10px 10px rgba(0, 0, 0, 0.2);
}
.container .content{
  display: flex;
  align-items: center;

}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: Blue;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 20px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #DDD1F8;
  border-radius: 6px;
  padding: 0 15px;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
}

 .btn {
			background-color: blue;
			color: white;
			border: 6px;
			padding: 5px;
			padding-right:60px;
			padding-left:60px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 4px;
			cursor: pointer;
			border-radius: 25px;
			
		}
		.register{
		 color:white;
		 padding-top:10px;
		 padding-left:110px;
		 font-size:12px;
		}
a{
color:#708090;
font-size: 18px;
text-decoration:none;
}
.table
{
	font-style: oblique;
	 font-size: 20px;
  font-weight: 600;
  color: black;
}
.table1
{
	font-style: oblique;
	 font-size: 30px;
  font-weight: 600;
  color: black;
}
.table2
{
	font-style: italic;
	 font-size: 20px;
  
  color: black;
}
.table3
{
	font-style: oblique;
	 font-size: 30px;
  font-weight: 600;
  color: black;
}
h2{
	color:blue;
}
		.register{
			margin-top:20px;
		 color:black;
		 padding-top:10px;
		 padding-left:150px;
		 font-size:20px;
		}
.a{
color:black;
}
#td{
	margin-left:0px;
}

.btn1 {
  position: absolute;

  transform: translate(-30%, -30%);
  -ms-transform: translate(-50%, -50%);
  background-color: white;
  color: black;
  font-size: 18px;
  padding: 16px 30px;
  margin-left:100px;
 border:5px red groove;
  cursor: pointer;
  border-radius: 10px;
  text-align: center;
  margin-left:200px;
}

.btn {
  background-color: #DB1F48;
  color: #fff;
  margin-left:530px;
  margin-bottom:30px;
 
  transition: background-color 1s;
}

.btn:hover {
  background-color: purple;
}

.btn:focus,
.btn:active {
  background-color: black;
  transition: none;
}
   
  </style>
</head>

<body>
<br>

   
 
  <div class="container">
  <a  href="home.php" class="btn"> cart more item</a> 
    <div class="content">
      <div class="right-side">
        <div class="topic-text"></div><br>
		
	  <div>	      

	
		<form method='POST' action="healthy.php">
		
		
        <table align="center"  width="700"  cellspacing="20px" cellpadding="10px">
              <tr>
			    <th>Name </th>
			    <th>Image </th>
                <th>description </th>
				
				</tr>
				
	 <?php
           while($row1=mysqli_fetch_array($res1))
			{
                $pid=$row1['pid'];
                $qy="select * from cart_systm where pid='$pid'; ";
                $re=mysqli_query($con,$qy);
                $row2=mysqli_fetch_array($re)
    ?>
			<tr>
			    <td><?php echo $row2['name']; ?>   </td>
				 <td><?php echo $row2['img']; ?> </td>
                 <td><?php echo $row2['description']; ?> </td>
			</tr>
		 <?php
            }
    ?>	  
	
            </table>
			</form>
			<?php
			
				mysqli_close($con);
		?>
		</div></div></div>
		 <div class="register">
			<br><a class="a" href="home.php"><button class="btn1">Back To Home</button> </a>
		</div>
		<br>
		<br>
		</div>
		
</body>

</html>
<?php
  
?>
