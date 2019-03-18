<div id="header">

    <ul class="headerNav">

        <li <? if(!$urlSections[1]) { ?>class="current"<? } ?>><a href="/">Home</a></li>
        <li <? if($urlSections[1] == "portfolio") { ?>class="current"<? } ?>><a href="/portfolio">Portfolio</a></li>
        <li <? if($urlSections[1] == "blog") { ?>class="current"<? } ?>><a href="/blog">Blog</a></li>
        <li <? if($urlSections[1] == "contact") { ?>class="current"<? } ?>><a href="/contact">Contact</a></li>

        <li class="flexGrow"></li>
        <li><a href="https://github.com/wilxiteMike" target="_blank"><img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png" /></a></li>

    </ul>

</div>