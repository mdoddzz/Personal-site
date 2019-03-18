<?php
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
?>
  <!-- END OF HEADER
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF MAIN CONTENT -->
  <div class="main_content">
    <div class="blog_heading">
      <h1>BLOG</h1>
      <h3>Welcome to my blog, this is where I write all sorts of things from website development, to project updates, to stupid things I want to talk about. All opinions on here are my own. Will be updating as regually as I can.</h3>
      <h1>Latests Posts</h1>
    </div>
    <div class="blog_content">
    <?PHP
    include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection, $db) or die ("Unable to select database!");

    $query = "SELECT * FROM `blog` ORDER BY `blog`.`ID`  DESC";

    // execute query
    $result = mysqli_query($connection, $query) or die ("Error in query: $query");

    // see if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // yes
        // print them one after another

        while($row = mysqli_fetch_row($result)) {
          echo "<table class='blog_post'>";
            echo "<tr class='blog_header'>";
              echo "<td class='blog_date_detail'>";
                echo "<div class='blog_date'>";
                  $timestamp = strtotime($row[6]);
                  $date = date('d-m-Y', $timestamp);
                  echo "<p>$date</p>";
                echo "</div>";
              echo "</td>";
              echo "<td>";
                echo "<h2 class='blog_title'>$row[1]</h2>";
                echo "<h3 class='blog_author'>by $row[5]</h3>";
              echo "</td>";
              echo "<td>";
                echo "<h3 class='blog_subject'>Subject: $row[2]</h3>";
              echo "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td class='blog_main_content' colspan='3'>";
                if(empty($row[4])) {

                }
                else {
                  echo "<img class='blog_image' src='$row[4]' />";
                }
                echo "<pre class='blog_content'>";
                $myfile = fopen($_SERVER['DOCUMENT_ROOT'].$row[3], "r");
                echo fread($myfile,filesize($_SERVER['DOCUMENT_ROOT'].$row[3]));
                fclose($myfile);
                echo "</pre>";
              echo "</td>";
            echo "</tr>";
          echo "</table>";
        }


    }
    else {
        // no
        // print status message
        echo "No rows found!";
    }

    // free result set memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($connection);
   ?>
  </div>
  </div>
  <!-- END OF MAIN CONTENT
  =-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF FOOTER -->
  <?php
    include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
   ?>
