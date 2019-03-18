<?
require 'twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Twiml;

// Use the Twilio PHP SDK to build an XML response
$response = new Twiml();

// If the user entered digits, process their request
if (array_key_exists('Digits', $_POST)) {
    switch ($_POST['Digits']) {
    case 1:
        $response->say('You selected sales. Good for you!');
        break;
    case 2:
        $response->say('You need support. We will help!');

        $response->dial('+447583311718');
        break;
    default:
        $response->say('Sorry, I don\'t understand that choice.');

        $response->redirect('/voice');
    }
} else {
    // If no input was sent, use the <Gather> verb to collect user input
    $gather = $response->gather(array('numDigits' => 1));
    // use the <Say> verb to request input from the user
    $gather->say('Hello welcome to michaels phone number, he is too lazy to answer, press 1 to leave a message, press 2 to actually speak to hime.');

    // If the user doesn't enter input, loop
    $response->redirect('/voice');
}

// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
?>
