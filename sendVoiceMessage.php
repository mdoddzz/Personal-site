<?
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
include("admin/includes/db.php");
$db = new DB;
require 'twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;

if($sbmt){

  // Your Account Sid and Auth Token from twilio.com/user/account
  $sid = "AC17a4468159073ed9f1bd448bbc9471bd";
  $token = "81aed04323af29a6ba58dd611fa88458";
  $client = new Client($sid, $token);

  $call = $client->calls->create(
      "+447453666726", "+441302231124",
      array(
        "url" => "https://michaeldodd.co.uk/prank.xml"
      )
  );

  $client->messages->create(
      '+447583311718',
      array(
          'from' => '+441302231124',
          'body' => "Pank Sent"
      )
  );

  echo $call->sid;
}
?>
<form method="post" name="adminSettingsForm" id="adminSettingsForm" enctype="application/x-www-form-urlencoded" action="sendVoiceMessage.php">
  <input type="text" name="phoneMessage"></input>
  <input type="text" name="phoneNumber"></input>
  <input type="hidden" name="sbmt"></input>
  <button type="submit">Send</button>
</form>
