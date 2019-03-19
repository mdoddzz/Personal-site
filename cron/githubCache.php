<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../inc/globals.php");
include_once("../inc/functions.php");
//include_once("db.php");

// Cache github data as it takes to long to run the curl commands at runtime
$gitUser = gitAPIcall("https://api.github.com/users/wilxiteMike");

$img = uploadRoot.'/git_profile_picture.jpeg';
file_put_contents($img, file_get_contents($gitUser["avatar_url"]));

?>