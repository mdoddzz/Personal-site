<?PHP
include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
if(isset($_SESSION["LoginError"])){
}
else {
  $_SESSION["LoginError"] = " ";
}
?>
<div class="main_content">
  <div class="register">
    <h1>Register</h1>
    <p class="loginError">
    <?PHP
      echo $_SESSION["LoginError"];
      unset($_SESSION["LoginError"]);
    ?>
    </p>
    <form class="registerForm" action="/processing/processRegister.php" method="post" enctype="multipart/form-data">
      <table class="loginTable">
        <tr>
          <td><h3>Username:</h3></td>
          <td><input name="txtUsername" type="text" /></td>
        </tr>
        <tr>
          <td><h3>Password:</h3></td>
          <td><input name="txtPassword" type="password" /></td>
        </tr>
        <tr>
          <td><h3>Comfirm Password:</h3></td>
          <td><input name="txtPasswordConfirm" type="password" /></td>
        </tr>
      </table>
      <a href="/login.php"><button type="button" class="btnRegister">Back</button></a>
      <input name="btnRegister" type="submit" value="Register" class="btnLogin"/>
    </form>
  </div>
</div>
<?PHP
include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
?>
