<?PHP
include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
if(isset($_SESSION["LoginError"])){
}
else {
  $_SESSION["LoginError"] = " ";
}
?>
<div class="main_content">
  <div class="login">
    <h1>Login TEST 3</h1>
    <p>Currently only admin accounts activated, stay tuned for user accounts</p>
    <p class="loginError">
    <?PHP
      echo $_SESSION["LoginError"];
      unset($_SESSION["LoginError"]);
    ?>
    </p>
    <form class="loginForm" action="/processing/processLogin.php" method="post" enctype="multipart/form-data">
      <table class="loginTable">
        <tr>
          <td><h3>Username:</h3></td>
          <td><input name="txtUsername" type="text" /></td>
        </tr>
        <tr>
          <td><h3>Password:</h3></td>
          <td><input name="txtPassword" type="password" /></td>
        </tr>
      </table>
      <a href="/register.php"><button type="button" class="btnRegister">Register</button></a>
      <input name="btnLogin" type="submit" value="Login" class="btnLogin"/>
    </form>
  </div>
</div>
<?PHP
include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
?>
