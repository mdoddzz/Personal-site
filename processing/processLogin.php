<?PHP
session_start();

//details
$username = $_POST["txtUsername"];
$password = $_POST["txtPassword"];

//database connection
include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

// open connection
$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

// select database
mysqli_select_db($connection, $db) or die ("Unable to select database!");

// Check database
$select = "SELECT * FROM users WHERE username = '$username'";

$login = mysqli_query($connection, $select);

if (mysqli_num_rows($login) == 1) {

  $row = mysqli_fetch_assoc($login);
  if (password_verify($password, $row['password'])) {

        $_SESSION["user"] = $username;

		    mysqli_close($connection);

        header("Location: /index.php");
        exit(0);
    }
    else {
        $_SESSION["LoginError"] = "*Error! Invalid username or password";

		    trigger_error("Password not found",E_USER_NOTICE);

		    mysqli_close($connection);

       header("Location: /login.php");
       exit(0);
    }
}
else {
  $_SESSION["LoginError"] = "*Error! Invalid username or password";

  trigger_error("Username not found",E_USER_NOTICE);

  mysqli_close($connection);

  header("Location: /login.php");
  exit(0);
}
?>
