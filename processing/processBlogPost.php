<?PHP
session_start();

//details
$title = $_POST["txtTitle"];
$subject = $_POST["drpSubject"];
$content = $_POST["txtContent"];
$username = $_SESSION["user"];

//content upload
date_default_timezone_set("GMT");

$date = date('d-m-Y');

$filename = $_SERVER['DOCUMENT_ROOT']."/blogposts/".$title."-".$date.".txt";

$contentupload = fopen($filename, "w");
fwrite($contentupload, $content);
fclose($myfile);

$contentpath = "/blogposts/".$title."-".$date.".txt";

//image upload

if ($_FILES["imgUpload"]["error"] > 0)
  {
  //echo "Error: " . $_FILES["imgUpload"]["error"] . "<br />";
  }
else
  {

  $target_dir = $_SERVER['DOCUMENT_ROOT']."/images/blog/";
  $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);

   if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
      // echo "The file ". basename($_FILES["imgUpload"]["name"]). " has been uploaded.";
       $image = "/images/blog/".basename($_FILES["imgUpload"]["name"]);
   }
   else {
      //echo "Sorry, there was an error uploading your file.";
   }

  }

//database connection
include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

// open connection
$connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

// select database
mysqli_select_db($connection, $db) or die ("Unable to select database!");

$sql = "INSERT INTO blog (Title, Subject, Comment, Picture, User, Time)
VALUES ('".$title."', '".$subject."', '".$contentpath."', '".$image."', '".$username."', CURRENT_TIMESTAMP)";

mysqli_query($connection, $sql);

mysqli_close($connection);

header("Location: /blog.php");
?>
