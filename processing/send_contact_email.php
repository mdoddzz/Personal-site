<?php
session_start();

if(isset($_POST['email'])) {


    $email_to = "whomjd5@gmail.com";

    $email_subject = "Form submitted on website";





    function died($error) {

        // your error code can go here
        $_SESSION['email_error'] = "*There were error(s) found with the form you submitted. " . $error;

        header("Location: /contact.php");
        exit(0);

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['subject']) ||

        !isset($_POST['content'])) {

        $_SESSION['email_error'] = 'There appears to be a problem with the form you submitted. Please fill in all boxes';
        header("Location: /contact.php");
        exit(0);

    }

    $_SESSION['email_name'] = $_POST['name'];

    $_SESSION['email_email'] = $_POST['email'];

    $_SESSION['email_subject'] = $_POST['subject'];

    $_SESSION['email_content'] = $_POST['content'];


    $name = $_POST['name'];

    $email_from = $_POST['email'];

    $subject = $_POST['subject'];

    $content = $_POST['content'];



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

  }

  if(strlen($content) < 2) {

    $error_message .= 'The Comments you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Subject: ".clean_string($subject)."\n";

    $email_message .= "Content: ".clean_string($content)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

mail($email_to, $email_subject, $email_message, $headers);

}

$_SESSION['email_success'] = "Email submitted! Thank you for taking the time to contact me, you should hear back soon.";
header("Location: /contact.php");
exit(0);
?>
