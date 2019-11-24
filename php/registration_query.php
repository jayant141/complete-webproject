<?php
$conn = mysqli_connect("localhost", "root", "", "webproject");
//include('./connect.php');
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$password = $_POST["PAS"];
$query = "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `P_number`, `passsword`, `wallet`) VALUES ('$fname','$lname','$email','$contact','$password',1000)";
$run = mysqli_query($conn, $query);
if ($run == true) {
	echo "You will be credite amount of 1000 for spending of webcart";
	header('location:./loginf.php');
} else {
	echo "error";
	header("location:registration.php");
}
