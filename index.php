<?php
  include($_SERVER['DOCUMENT_ROOT']."/universal/header.inc");
?>
  <!-- END OF HEADER
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF MAIN CONTENT -->
  <div class="main_content">
    <div class="main_header">
      <h1>Michael Dodd</h1>
      <h1>Junior Web Developer</h1>
      <h4>specialising in PHP, SQL & AJAX</h4>
    </div>
    <div class="main_about">
      <div class="about_content">
        <img class="about_img" src="images/me.jpg"/>
          <h1>About Me</h1>
          <p>Hello, I'm Michael Dodd and I'm a beginner web designer and developer, mainly focusing on development with my keen skils in PHP and mySQL and developing advanced skills in AJAX to create responsive and cleaver modern websites. This website exists to show off my talent in web skills I have self taught myself over the years and a place to put my thoughs and test out code I have worked on.</p>
          <p>If you want to find out more about me then you can click the button below to find out about my whole life, probably a risking thing to put on the internet but should be fine, didn't include my bank details so I think we are all good, anyway hope you like the website.</p>
          <div class="links_button">
            <a href="/about.php"><button id="button1">More About Me</button></a>
          </div>
      </div>
    </div>
    <div class="main_links">
      <div class="links_portfolio">
        <h1>Portfolio</h1>
        <h5>See all my work I've done in the past, not just web development but all projects</h5>
        <div class="links_button">
          <a href="/portfolio.php"><button id="button1">View Portfolio</button></a>
        </div>
      </div>
      <div class="links_blog">
        <h1>Blog</h1>
        <h5>Get the rare update on what I'm doing in life or projects and maybe the occasional rant</h5>
        <div class="links_button">
          <a href="/blog.php"><button id="button1">View Blog</button></a>
        </div>
      </div>
      <div class="links_contact">
        <h1>Contact</h1>
        <h5>Slide into the email</h5>
        <div class="links_button">
          <a href="/contact.php"><button id="button1">Contact Me</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF MAIN CONTENT
  =-=-=-=-=-=-=-=-=-=-=-=-=-=
  START OF FOOTER -->
  <?php
    include($_SERVER['DOCUMENT_ROOT']."/universal/footer.inc");
   ?>
