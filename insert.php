<?php header('location: cuslogin.php');
$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$statecode = $_POST['statecode'];
$countrycode = $_POST['countrycode'];
$phonecode = $_POST['phonecode'];
$number = $_POST['number'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];


if (!empty($name) || !empty(gender) || !empty($address) || !empty($statecode) || !empty($countrycode) || !empty($phonecode) || !empty($number) || !empty($email) || !empty($user) || !empty($password)) {
    $host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "beauty";
	
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	
	if(mysqli_connect_error()) {
	       die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else {
	    $SELECT = "SELECT email From custoreg Where email = ? Limit 1";
		$INSERT = "INSERT Into custoreg (name, gender, address, statecode, countrycode, phonecode, number, email, user, password)values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
       $stmt = $conn->prepare($SELECT);
	   $stmt->bind_param("s", $email);
	   $stmt->execute();
	   $stmt->bind_result($email);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0) {
	       $stmt->close();
		   
		   $stmt = $conn->prepare($INSERT);
		   $stmt->bind_param("sssssiisss", $name, $gender, $address, $statecode, $countrycode, $phonecode, $number, $email, $user, $password);
		   $stmt->execute();
		   echo "New record inserted successfully";
	   } else {
	       echo "Someone already register using this email";
	   }
	   $stmt->close();
	   $conn->close();
	}
} else {
    echo "All field are required";
	die();
}
?>