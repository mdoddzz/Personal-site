<?
$gitUser = gitAPIcall("https://api.github.com/users/wilxiteMike");
?>
<div id="header">

    <ul class="headerNav">

        <li <? if(!$urlSections[1]) { ?>class="current"<? } ?>><a href="/">Home</a></li>
        <li <? if($urlSections[1] == "portfolio") { ?>class="current"<? } ?>><a href="/portfolio">Portfolio</a></li>
        <li <? if($urlSections[1] == "blog") { ?>class="current"<? } ?>><a href="/blog">Blog</a></li>
        <li <? if($urlSections[1] == "contact") { ?>class="current"<? } ?>><a href="/contact">Contact</a></li>

        <li class="flexGrow"></li>
        <li><a href="https://github.com/wilxiteMike" target="_blank" title="My GitHub Profile"><img src="<?= uploadLocation."/git_profile_picture.jpeg"; ?>" /></a></li>

    </ul>

</div>