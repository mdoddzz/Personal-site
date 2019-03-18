<?php
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");

  if(!isset($_SESSION['email_error'])){
    $_SESSION['email_error'] = " ";
  }
  if(!isset($_SESSION['email_success'])){
    $_SESSION['email_success'] = " ";
  }
?>
  <!-- END OF HEADER
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF MAIN CONTENT -->
  <div class="main_content">
    <form name="contactform" method="post" action="processing/send_contact_email.php">
      <table class="contactform_table">
        <caption>Email Form</caption>
          <?PHP
          echo "<h4 class='email_error'>" . $_SESSION['email_error'] . "</h4>";
          echo "<h4 class='email_success'>" . $_SESSION['email_success'] . "</h4>";
          ?>
        <tr>
          <td class="table_lable">
            <lable for="name">Name: </lable>
          </td>
          <td>
            <input type="text" name="name" maxlength="50" size="30" value="<?php echo isset($_SESSION['email_name']) ? $_SESSION['email_name'] : '' ?>">
          </td>
        </tr>
        <tr>
          <td class="table_lable">
            <lable for="email">Email: </lable>
          </td>
          <td>
            <input type="text" name="email" maxlength="80" size="30" value="<?php echo isset($_SESSION['email_email']) ? $_SESSION['email_email'] : '' ?>">
          </td>
        </tr>
        <tr>
          <td class="table_lable">
            <lable for="subject">Subject: </lable>
          </td>
          <td>
            <select name="subject" value="<?php echo isset($_SESSION['email_subject']) ? $_SESSION['email_subject'] : '' ?>">
              <option value="general">General</option>
              <option value="support">Support</option>
              <option value="job">Job/ Quote</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="table_lable">
            <p class="table_email">Email Content: </p>
          </td>
          <td>
            <textarea type="text" name="content" maxlength="1000" rows="15" cols="80" size="30"><?php echo isset($_SESSION['email_content']) ? $_SESSION['email_content'] : '' ?>"</textarea>
          </td>
        </tr>
        <tr>
          <td>
          </td>
          <td class="table_submit">
            <input type="submit" value="Email Me"></input>
          </td>
        </tr>
      </table>
  </div>
  <?php
    unset($_SESSION['email_error']);
    unset($_SESSION['email_success']);
    unset($_SESSION['email_name']);
    unset($_SESSION['email_email']);
    unset($_SESSION['email_subject']);
    unset($_SESSION['email_content']);
    include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
   ?>
