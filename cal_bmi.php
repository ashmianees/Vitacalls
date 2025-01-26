<!-- Author: w3schools.in
URL: https://www.w3schools.in/php/examples/simple-calculator-program
license: Free to use without republishing.
https://www.w3schools.in/page/copyright -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Height=$_POST['height'];
	$HeightUnit=$_POST['heightUnit'];
	$Weight=$_POST['weight'];
	$WeightUnit=$_POST['weightUnit'];
	if($Height == '' || $Weight == '' || $HeightUnit == '' || $WeightUnit == ''){
		$Error = "The input values are required.";
	}
	elseif (filter_var($Height, FILTER_VALIDATE_FLOAT) === false || filter_var($Weight, FILTER_VALIDATE_FLOAT) === false) {
		$Error = "The input value must be a number only.";
	}
	else{
		/*Calculation begins from here.*/
		/*Convert cm to inch -> foot to inch -> meter to inch */
		$HInches = ($HeightUnit=='centimeter')?$Height*0.393701:(($HeightUnit=='foot')?$Height*12:(($HeightUnit=='meter')?$Height*39.3700787:$Height));
		/*Convert kg to pound*/
		$WPound = ($WeightUnit=='kilogram')?$Weight*2.2:$Weight;
		$BMIIndex = round($WPound/($HInches*$HInches)* 703,2);

		/*Set Message*/
		if ($BMIIndex < 18.5) {
			$Message="Underweight";
		} else if ($BMIIndex <= 24.9) {
			$Message="Normal";
		} else if ($BMIIndex <= 29.9) {
			$Message="Overweight";
		} else {
			$Message="Obese";
		}
	}
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> BMI Calculator Program </title>
	<link rel="shortcut icon" href=https://www.w3schools.in/asset/img/favicon-32x32.png type=image/png>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../asset/app.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<!-- Top bar -->
	<div class="container-fluid shadow-sm border-bottom mb-4">
		<div class="row aligh-items-center">
			<div class="col">
				<nav class="navbar navbar-light">
					<a class="fa fa-home" href="receipe_view.php" title="Back To Home"><svg class="svg-icon" viewBox="0 0 24 24">
						<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
						<polyline points="7 10 12 15 17 10"></polyline>
						<line x1="12" y1="15" x2="12" y2="3"></line>
					</svg></a>
					
					
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<!-- Editor -->
	<div class="container" style="max-width:800px">
		<div class="text-center mb-5">
			<h1 class="fw-bolder mb-0"> BMI Calculator</h1>
		</div>
		<form method="post" action="">
			<div class="row justify-content-center" >
				<div class="col">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 justify-content-center">
						<div class="col text-center mb-3 mb-md-5">
							<label for="height" class="fs-3">Height</label>
							<div class="input-group">
								<input id="height" class="form-control form-control-custom w-50" name="height" type="number" step="any" value="<?php if(!empty($Height)){echo $Height;}?>">
								<select class="form-select w-50" name="heightUnit">
									<option value="centimeter" <?php if(isset($HeightUnit) && $HeightUnit=='centimeter'){echo "selected";}?>>Centimeter</option>
									<option value="inch" <?php if(isset($HeightUnit) && $HeightUnit=='inch'){echo "selected";}?>>Inch</option>
									<option value="foot" <?php if(isset($HeightUnit) && $HeightUnit=='foot' || !isset($HeightUnit)){echo "selected";}?>>Foot</option>
									<option value="meter" <?php if(isset($HeightUnit) && $HeightUnit=='meter'){echo "selected";}?>>Meter</option>
								</select>
							</div>
						</div>
						<div class="col text-center mb-3 mb-md-4">
							<label for="weight" class="fs-3">Weight</label>
							<div class="input-group">
								<input id="weight" class="form-control form-control-custom w-50" name="weight" type="number" step="any" value="<?php if(!empty($Weight)){echo $Weight;}?>">
								<select class="form-select w-50" name="weightUnit">
									<option value="kilogram" <?php if(isset($WeightUnit) && $WeightUnit=='kilogram'){echo "selected";}?>>Kilogram</option>
									<option value="pound" <?php if(isset($WeightUnit) && $WeightUnit=='pound'){echo "selected";}?>>Pound</option>
								</select>
							</div>
						</div>
						<div class="col text-center mb-3 mb-md-4"><input type="submit" name="submit" value="Calculate" class="btn btn-success"></div>
					</div>
				</div>
			</div>
		</form>
		<?php if(isset($BMIIndex) && is_numeric($BMIIndex)){?><!-- Result -->
		<div class="row justify-content-center">
			<div class="col text-center">
				<label for="Result" class="fs-4">Result</label>
				<input id="Result" name="Result" class="form-control form-control-custom" value="<?php echo $BMIIndex.' '.$Message; ?>">
			</div>
		</div>
		<?php } if(isset($Error)){?><!-- Error Messages -->
		<div class="row justify-content-center">
			<div class="col">
				<div class="alert alert-danger shadow-sm" role="alert">Error: <?php echo $Error; ?></div>
			</div>
		</div>
	<?php } ?>
</div>
</body>
</html>


<?php
// Add patient to database
if(isset($_POST['submit'])) {
    $patient_name = $_POST['patient_name'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    
    $sql = "INSERT INTO patients (patient_name, patient_id, doctor_id) VALUES ('$patient_name', '$patient_id', '$doctor_id')";
    
    if(mysqli_query($con, $sql)) {
        echo "Patient added successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Display assigned patients for logged-in doctor
if(isset($_SESSION['doctor_id'])) {
    $doctor_id = $_SESSION['doctor_id'];
    
    $sql = "SELECT patient_name, patient_id FROM patients WHERE doctor_id = '$doctor_id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Patient Name: " . $row['patient_name'] . " | Patient ID: " . $row['patient_id'] . "<br>";
        }
    } else {
        echo "No assigned patients";
    }
}
?>
