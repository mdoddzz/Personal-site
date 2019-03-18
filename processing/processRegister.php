<?php
session_start();

//details
$username = $_POST["txtUsername"];
$password = $_POST["txtPassword"];
$passwordcomf = $_POST["txtPasswordConfirm"];

if ($password == $passwordcomf){

}
else {
  $_SESSION["LoginError"] = "Error! Passwords do not match!";

  header("Location: /register.php");
  exit(0);
}
//database connection
include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

// open connection
$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

// select database
mysqli_select_db($connection, $db) or die ("Unable to select database!");

$select = "SELECT * FROM users WHERE username = '$username'";

$dupe = mysqli_query($connection, $select);

if (mysqli_num_rows($dupe) > 0) {
  $_SESSION["LoginError"] = "Error! Username already taken!";

  mysqli_close($connection);

  header("Location: /register.php");
  exit(0);
}
else {
  // hash the password
  $hash = password_hash($password, PASSWORD_DEFAULT);

  //insert data
  $sql = "INSERT INTO `users` (`username`, `password`, `Created`) VALUES ('".$username."', '".$hash."', CURRENT_TIMESTAMP);";

  if (mysqli_query($connection, $sql)) {
      $_SESSION["user"] = $username;
  }
  else {
      $_SESSION["UserError"] = "Error! Database error!";
  }

  mysqli_close($connection);

  header("Location: /index.php");
  exit(0);
}

 ?>
