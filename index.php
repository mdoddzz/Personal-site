<?

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("inc/globals.php");
include_once("inc/functions.php");
//include_once("db.php");
?>

<head>

    <!-- Page title -->
    <title>Home - Michael Dodd</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

</head>
<body>
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