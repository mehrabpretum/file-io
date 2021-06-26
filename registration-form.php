<?php 

	define("filepath", "data.txt");
	$firstName =$lastName =$dobN = $presentAdd = $permanetAdd = $phoneNum = $userName = $password = "";
	$isValid = true;

	$firstNameErr = $lastNameErr = $dobNErr = $presentAddErr = $permanetAddErr = $phoneNumErr = $userNameErr = $passwordErr = "";

	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$dobN = $_POST['dob'];
		$presentAdd = $_POST['presentadd'];
        $permanetAdd = $_POST['permanetadd'];
        $phoneNum = $_POST['phonenum'];

		$userName = $_POST['username'];
		$password = $_POST['password'];

		if(empty($firstName)) {
			$firstNameErr = "First name can not be empty!";
			$isValid = false;
		}
		if(empty($lastName)) {
			$lastNameErr = "Last name can not be empty!";
			$isValid = false;
		}
		if(empty($dobN)) {
			$dobNErr = "Date of Birth can not be empty!";
			$isValid = false;
		}
		if(empty($presentAdd )) {
			$presentAddErr = "Present Address can not be empty!";
			$isValid = false;
		}
		if(empty($permanetAdd )) {
			$permanetAddErr = "Permanet Address can not be empty!";
			$isValid = false;
		}
		if(empty($phoneNum)) {
			$phoneNumErr = "Phone Number can not be empty!";
			$isValid = false;
		}
		if(empty($userName)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
		}

		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			$firstName = test_input($firstName);
            $lastName  = test_input($lastName);
            $dobN      = test_input($dobN);
            $presentAdd= test_input($presentAdd);
          $permanetAdd = test_input($permanetAdd);
            $phoneNum  = test_input($phoneNum);
			$userName = test_input($userName);
			$password = test_input($password);

			$data = array('firstname' => $firstName,'lastname' => $lastName, "dob" => $dobN ,"presentadd" => $presentAdd ,"permanetadd" => $permanetAdd ,"phonenum" => $phoneNum ,"username" => $userName, "password" => $password);
			 $data_encode = json_encode($data);
			$result1 = write($data_encode);
			if($result1) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
	function write($content) {
			$resource = fopen(filepath, "a");
			$fw = fwrite($resource, $content . "\n");
			fclose($resource);
			return $fw;
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body>

	<h1>Registration Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Registration Form:</legend>

			<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname">
			<span style="color:red"><?php echo $firstNameErr; ?></span>

			<br><br>

			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname">
			<span style="color:red"><?php echo $lastNameErr; ?></span>

			<br><br>
			<label for="dob">DoB:</label>
 	        <input type="date" id="dob"name="dob">
 	        <span style="color:red"><?php echo $dobNErr; ?></span>	

 	        <br><br>

 	        <label for="presentadd">Present Address:</label>
			<input type="text" name="presentadd" id="presentadd">
			<span style="color:red"><?php echo $presentAddErr; ?></span>

			<br><br>

			<label for="permanetadd">Permanet Address:</label>
			<input type="text" name="permanetadd" id="permanetadd">
			<span style="color:red"><?php echo $permanetAddErr; ?></span>

			<br><br>

			<label for="phonenum">Phone Number:</label>
			<input type="tel" name="phonenum" id="phonenum">
			<span style="color:red"><?php echo $phoneNumErr; ?></span>

			<br><br>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="Submit">
		</fieldset>
	</form>

	<p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

	<br>

	<p>Back to<a href="login-form.php">Login</a></p>

</body>
</html>