<?PHP
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="google-site-verification" content="Gv527yxs_qInTfXle3c1OBBX_tv3u8FTJtLd9JAS9N8" />
  <link href="/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="/images/favicon/favicon.png">
  <title>HOME - Michael Dodd</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<!-- START OF HEADER -->
<div class="header">
<!--Social Links at the top right of the page -->
<table class="header_social">
  <tr>
    <td><p>Social:</p></td>
    <td><a href="http://twitter.com/mdoddzz"><img class="social_image" ID="Twitter" src="/images/Social/twitter.png"/></a></td>
    <td><a href="http://instagram.com/mdoddzz"><img class="social_image" ID="Instagram" src="/images/Social/instagram.png"/></a></</td>
    <td><a href="https://uk.pinterest.com/mdoddzz/"><img class="social_image" ID="Pintrest" src="/images/Social/pintrest.png"/></a></td>
    <td><a href="/contact.php"><img class="social_image" ID="Email" src="/images/Social/email.png"/></a></td>
 </tr>
</table>
<!-- Main logo on the left side -->
<div class="header_logo">
  <a href="/index.php"><img class="image_logo" src="/images/Main_Logo.png"/></a>
</div>
<!-- The table for the menu bar -->
<?php
echo "<table class='header_menu'>";
 $loc = $_SERVER['PHP_SELF'];

 if ($loc == "/index.php") {
   echo "<td class='menu_page' ID='active'><a href='/index.php'>Home</a></td>";
 }
 else {
   echo "<td class='menu_page'><a href='/index.php'>Home</a></td>";
 }

 if ($loc == "/portfolio.php") {
   echo "<td class='menu_page' ID='active'><a href='/portfolio.php'>Portfolio</a></td>";
 }
 else {
   echo "<td class='menu_page'><a href='/portfolio.php'>Portfolio</a></td>";
 }

 if ($loc == "/blog.php") {
   echo "<td class='menu_page' ID='active'><a href='/blog.php'>Blog</a></td>";
 }
 else {
   echo "<td class='menu_page'><a href='/blog.php'>Blog</a></td>";
 }

 if ($loc == "/contact.php") {
   echo "<td class='menu_page' ID='active'><a href='/contact.php'>Contact</a></td>";
 }
 else {
   echo "<td class='menu_page'><a href='contact.php'>Contact</a></td>";
 }

 echo "</table>";
 ?>
</div>
