<?php
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
?>
  <!-- END OF HEADER
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF MAIN CONTENT -->
  <div class="main_content">
    <div class="main_pipehextreme">
      <h1>PIPE HEXTREME GAME</h1>
      <h4>A simple game I made for my game design class</h4>
    </div>
    <div class="pipehextreme_about">
      <div class="about_content">
        <img class="about_img" src="/images/PipeHextreme_Icon.png"/>
          <h1>About The Game</h1>
          <p>Pipe Hextreme is based on the game Pipe Extreme, a simple java game we used to download and play on the computers during lessons in secondary school. I wanted to recreate that game but with a twist and I have always designed my brand image as a person around hexagons so I decided to create Pipe Hextreme making the pipe into a hexagon shape. The game is created in unity using c# coding scripts to make everything function.</p>
          <p>I am proud as the first game I have ever produced to look not too bad, I plan to work on this game past what is required for my college work and bring this game to be just as legendary as the game I used to play back in secondary school. I have a lot of plans to build this game up and hope you enjoy the ride of development as I make this game better and better.</p>
          <h3>View the documentation I produced before creating the game below:</h3>
          <a href="/Downloads\Initial documentation.pdf" download><button type="button">Initial Documentation</button></a>
          <a href="/Downloads\Design documentation.pdf" download><button type="button">Design Documentation</button></a>
      </div>
    </div>
    <div class="pipehextreme_dowloads">
      <h1>Dowloads</h1>
      <table>
        <tr>
            <td colspan="2">
            <a href="/Downloads/Pipe Hextreme B2.0 Windows.zip" download><h2>DOWNLOAD</h2></a>
            <h4>Windows verson Beta2.0</h4>
          </td>
          <td colspan="2">
            <a href="/Downloads/Pipe Hextreme B2.0 Mac.zip" download><h2>DOWNLOAD</h2></a>
            <h4>Mac OS X verson Beta2.0</h4>
          </td>
          <td colspan="2">
            <a href="/Downloads/Pipe Hextreme B2.0 Lunix.zip" download><h2>DOWNLOAD</h2></a>
            <h4>Lunix verson Beta2.0</h4>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <a href="/Downloads/OldPipeHextreme"><h2>Old Downloads</h2></a>
          </td>
          <td colspan="3">
            <h2>Mobile</h2>
            <h4>Coming soon</h4>
          </td>
        </tr>
      </table>
    </div>
    <div id="blog_pipehextreme" class="blog_content">
      <div class="blog_pipehextreme_title">
        <h1>Pipe Hextreme Updates</h1>
        <h4>This is blog updates for the game, including change logs and many other details to keep up to date with the development</h4>
      </div>
    <?PHP
    include($_SERVER['DOCUMENT_ROOT']."/universal/databaseLogin.inc");

    // open connection
    $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection, $db) or die ("Unable to select database!");

    $query = "SELECT * FROM `blog` WHERE Subject='Pipe Hextreme' ORDER BY `blog`.`ID`  DESC";

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
