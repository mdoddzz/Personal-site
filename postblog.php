<?PHP
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
  //database connection
  include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

  // open connection
  $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

  // select database
  mysqli_select_db($connection, $db) or die ("Unable to select database!");

  // Check database
  $select = "SELECT * FROM users WHERE username = '$_SESSION[user]'";

  $login = mysqli_query($connection, $select);

  if (mysqli_num_rows($login) == 1) {
      $row = mysqli_fetch_assoc($login);
      if ($row['Admin'] == 1){

      }
      else {
        header("Location: /login.php");
        exit(0);
      }
    }
  else{
      header("Location: /login.php");
      exit(0);
  }
?>
  <div class="main_content">
    <form class="postblogForm" action="/processing/processBlogPost.php" method="post" enctype="multipart/form-data">
      <table class="postblogTable">
        <tr>
          <td><h3>Title:</h3></td>
          <td><input name="txtTitle" type="text" /></td>
          <td><h3>Subject:</h3></td>
          <td>
            <select name="drpSubject">
              <option value="General">General</option>
              <option value="Pipe Hextreme">Pipe Hextreme</option>
            </section>
          </td>
        </tr>
        <tr>
          <td><h3>Content:</h3></td>
        </tr>
        <tr>
          <td colspan="4"><textarea name="txtContent" rows="15" cols="100" >Enter post here</textarea></td>
        </tr>
        <tr>
          <td><h3>Image:</h3></td>
          <td><input name="imgUpload" type="file" id="imgUpload"/></td>
        </tr>
      </table>
      <input name="btnLogin" type="submit" value="Submit" class="btnSubmit"/>
    </form>
  </div>
<?PHP
  include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
?>
