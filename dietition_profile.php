<?php
include("dietition_dashboard.php");

$con=mysqli_connect("localhost","root","","miniproject");
	if( isset($_SESSION['did'])){
		$did1=$_SESSION['did'];
       
			$q="select* from dietition_log where status=2 and did='$did1';";
				$res=mysqli_query($con,$q);
        $row=mysqli_fetch_array($res);
       

			$query="select * from dietition_reg where status=1 and did='$did1';";
      $re=mysqli_query($con,$query);
			$row1=mysqli_fetch_array($re);
	}
	
	
?>
<html>
<style>
 .container {
      font-size: 14px;
      width: 1000px;
      /* margin-top: 850px; */
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      padding: 107px;
      padding-top:45px;
    }
    .home-section>.container {
      padding-top: 150px;
      margin-left: 5px;
    }

    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
      margin-left: 75px;
    }

    .content .right-side .topic-text {
      font-size: 23px;
      font-weight: 600;
      margin-top: -50px;
      color: Blue;
    }
    .register {
      color: white;
      padding-top: 10px;
      padding-left: 110px;
      font-size: 12px;
    }

    table {

      background-color: #d2f8d1;
      border-radius: 12px;
      width: 1070px;
      padding-left: 20px;
      margin-bottom: 20px;
    }
    th,
    td {
      border-bottom: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    th button {
      padding: 7px 40px;
      margin-left: 710px;
      border: none;
      font-size: 15px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }

    .add-btn {
      background-color: #55df1d;
      align:center;
      margin-left: 710px;
      padding: 7px 40px;
      margin-left: 710px;
      border: none;
      font-size: 15px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }
    

    </style>
 <div class="container" id="page-content">
            <div class="padding">
              <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                  <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                      <div class="col-sm-4 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-white">
                          
                          <table align="center" width="900" height="200">

                            <div class="col-sm-8">
                              <div class="card-block">
                                <div class="m-b-20 p-b-5 b-b-default f-w-600">
                                  <tr>
                                    <td>Name :</td>
                                    <td>
                                      <?php echo $row1['fname'];?> <?php echo $row1['lname'];
                                      
                                      ?>
                                     
                                    </td>
                                  </tr>
                                </div>
                              </div>
                              <tr>
                                <td>Phone :</td>
                                <td>
                                  <?php echo $row1['mob'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Email :</td>
                                <td>
                                  <?php echo $row['username'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Assigned Age :</td>
                                <td>
                                  <?php echo $row1['age'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Assigned Weight :</td>
                                <td>
                                  <?php echo $row1['weight'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Assigned Duty :</td>
                                <td>
                                  <?php echo $row1['assigned'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Assigned Age :</td>
                                <td>
                                  <?php echo $row1['role'] ;?>
                                </td>
                              </tr>
                              <tr>
                                <td>Experience :</td>
                                <td>
                                  <?php echo $row1['exp'] ;?>
                                </td>
                              </tr>
                           

                              


                          </table>
                          <button class="add-btn" name="submit"><a href="edit_dietition.php" style="color:rgb(78,64,64);">Update</a></button>
                          <button class="add-btn" name="submit"><a href="dietition_psw.php" style="color:rgb(78,64,64);">Upadate Password</a></button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <?php
				mysqli_close($con);
		?>