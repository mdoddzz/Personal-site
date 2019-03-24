<?
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

include_once("inc/globals.php");
include_once("inc/functions.php");
//include_once("db.php");

$darkTheme = $_COOKIE["darkTheme"];
?>
<html>
<head>

    <!-- Page title -->
    <title>Home - Michael Dodd</title>

    <!-- Meta -->
    <meta name="viewport" content="width=device-width">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    <!-- Dark Mode CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/dark.css">

    <!-- Icon CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/fontawesome.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="/assets/js/jquery.js"></script>

</head>
<body <? if($darkTheme) { ?>class="night";<? } ?>>
    <?
    // current page url (to get template and other page details)
    $urlSections = explode('/', $_SERVER["REQUEST_URI"]);

    include("structure/header.php");

    // temp solution for page management

    ?>
    <div id="body">
        <?
        switch($urlSections[1]) {

            case 'portfolio':
                include("widgets/portfolio.php");
            break;

            case 'blog':
                include("widgets/blog.php");
            break;

            case 'contact':
                include("widgets/contact.php");
            break;

            default:
                include("widgets/home.php");
            break;

        }
        ?>
    </div>
</body>
<!-- global script -->
<script>

    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    $(function(){

        $('.toggle').click(function(){

            if($(this).hasClass('active')){
                
                setCookie("darkTheme", 0);
                $('body').removeClass('night');
                $(this).removeClass('active');

            } else {

                setCookie("darkTheme", 1);
                $('body').addClass('night');
                $(this).addClass('active');

            }

        });

    })

</script>
</html>