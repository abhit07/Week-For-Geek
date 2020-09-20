<!DOCTYPE html>
<html>
	<head>
    <title>Form</title>
	<link rel="stylesheet" type="text/css" href="Form.css">
	</head>
	<body>
        <br>
        <br>
		<fieldset>
            <legend>User personal information</legend>
            <br>
            <br>
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label for="name">Enter your full name:</label><br>
    			<input type="text" id="name" name="name"><br><br>
    			<label for="email">Enter your email:</label><br>
    			<input type="email" id="email" name="email"><br><br>
    			<label for="Mobile">Enter your Mobile no:</label><br>
    			<input type="tel" id="Mobile" name="Mobile"><br><br>
    			<label for="gender">Select your gender:</label><br>
				<input type="radio" id="male" name="gender" 
    			value="Male">
  				<label for="male">Male</label><br>
  				<input type="radio" id="female" name="gender" value="Female">
  				<label for="female">Female</label><br>
  				<input type="radio" id="other" name="gender" value="Other">
 		 		<label for="other">Other</label><br><br>
                
                <label for="edu">Select your Education:</label><br>
                <input type="checkbox" id="ssc" name="edu" value="SSC">
				<label for="ssc">SSC</label><br>
				<input type="checkbox" id="hsc" name="edu" value="HSC/DIPLOMA">
				<label for="hsc">HSC/DIPLOMA</label><br>
				<input type="checkbox" id="eng" name="edu" value="Engineering">
				<label for="eng">ENGINEERING</label><br><br>

				<label for="address">Enter your Address:</label><br>

				<textarea rows="2" cols="50" name="address">
				</textarea>
				<br>
				<br>
    			<input type="submit" value="Submit">
			</form>
        </fieldset>
        <br>
        <br>
         <?php
            $name = $email = $mobile = $gender = $edu = $add = "";
            
            echo "<h2>Your Input:</h2>";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $edu = test_input($_POST["edu"]);
                $add = test_input($_POST["address"]);
                
                
             if (empty($_POST["name"])) {
               echo "<b>Name is required !!</b>";
               echo "<br>";
            }else {
               $name = test_input($_POST["name"]);
               
               if (!preg_match('/^[a-z]*$/i', $name)) {
                  echo "<b>Name Contains only characters !!</b>";
                  echo "<br>";
                  }
               else{
               		echo "<i>Name:- </i>";
               		echo $name;
               		echo "<br>";
               	}
            }
            
            if (empty($_POST["email"])) {
               	echo "<b>Email is required !!</b>";
               	echo "<br>";
            }else {
               $email = test_input($_POST["email"]);
         
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo "<b>Invalid email format !!</b>";
                  echo "<br>";
                  }
               else{
               		echo "<i>Email:- </i>";
               		echo $email;
               		echo "<br>";
               	}
            }
            
            if (empty($_POST["Mobile"])) {
               	echo "<b>Mobile no. is required !!</b>";
               	echo "<br>";
            }else {
               $mobile = test_input($_POST["Mobile"]);
               
               if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
                  echo "<b>Invalid Mobile no. !!</b>";
                  echo "<br>";
                  }
               else{
               		echo "<i>Mobile No:- </i>";
               		echo $mobile;
               		echo "<br>";
               	}
            }
            
            
            if (empty($_POST["gender"])) {
               echo "<b>Gender is required !!</b>";
               echo "<br>";
            }else {
               $gender = test_input($_POST["gender"]);
               echo "<i>Gender:- </i>";
               echo $gender;
               echo "<br>";
            }
        echo "<i>Education:- </i>";
        echo $edu;
        echo "<br>";
        echo "<i>Address:- </i>";
        echo $add;
            
       }

            
function test_input($data) {
	$data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
?>
        
	</body>
</html>