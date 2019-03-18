<?php
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
?>
<script>
$(document).ready(function(){
  $(".portfolio_content").hide();
  });
</script>
  <!-- END OF HEADER
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF MAIN CONTENT -->
  <div class="main_content">
    <div class="portfolio_title">
      <h1>The Portfolio Of Michael Dodd</h1>
      <h3>This is a collection of all my work, mostly personal projects, there are not as many projects here as I would like there to be but many projects in the past I have abandoned as I was learning newer and better way to do the things I wanted to, hopefully now that I feel confident with my abilities I can start adding more of my personal work to this collection.</h3>
    </div>
    <!-- COLLEGE PORTFOLIO -->
    <div class="portfolio_dropdown">
      <div class="portfolio_heading" id="college">
        <h2>> College Work</h2>
      </div>
      <div class="portfolio_content" id="college">
        <table class="portfolio_items">
          <tr>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\PipeHextreme.png"/>
                <h3>Pipe Hextreme</h3>
                <p>A simple game for my game design class made in unity and coded using C#. I have full written documentation to compliment the game too.</p>
                <a href="/Portfolio/PipeHextreme" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\DiscussionBoard.png"/>
                <h3>Discussion Board</h3>
                <p>Made for my Human Computer Interface and my Web Server Scripting class this is a discussion board made using HTML, CSS, PHP and handled on a mySQL database.</p>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
                <!--<p>Description</p>
                <button type="button">View More</button>-->
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <!-- PERSONAL PROJECTS PORTFOLIO -->
    <div class="portfolio_dropdown">
      <div class="portfolio_heading" ID="personal">
        <h2>> Personal Projects</h2>
      </div>
      <div class="portfolio_content" ID="personal">
        <table class="portfolio_items">
          <tr>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>MichaelDodd.co.uk</h3>
                <p>This is the website you are on now, a lot of work and different coding went in to making this site, learn more about the code behind this site</p>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <!-- FREELANCE PORTFOLIO -->
    <div class="portfolio_dropdown">
      <div class="portfolio_heading" ID="freelance">
        <h2>> Freelance Work</h2>
      </div>
      <div class="portfolio_content" ID="freelance">
        <table class="portfolio_items">
          <tr>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
            <td class="portfolio_item">
              <div class="portfolio_detail">
                <img src="images\portfolio\ComingSoon.jpg"/>
                <h3>Coming Soon</h3>
                <a href="/Portfolio/DiscussionBoard" ><button id="button1" type="button">View More</button></a>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <!-- END OF MAIN CONTENT
  =-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF FOOTER -->
  <?php
    include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
   ?>
   <script>
   $(document).ready(function(){
    $(".portfolio_heading").click(function(){
        var idstart = "#";
        var id = $(this).attr('id');
        var content = ".portfolio_content";
        var toggle = idstart.concat(id,content);
        $(toggle).slideToggle(1000);
      });
    });
   </script>
