<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="/css/default.css">
        <link rel="stylesheet" type="text/css" href="/css/dark.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <title>@yield('headTitle') - Micahel Dodd</title>

    </head>

    <body {{( isset($_COOKIE['darkTheme']) && $_COOKIE['darkTheme'] ? 'class=night' : false )}}>

        <div id="header">

            <ul class="headerNav">

                <li {{( Request::segment('1') == '' ? 'class=current' : false )}}><a href="/">Home</a></li>
                <li {{( Request::segment('1') == 'portfolio' ? 'class=current' : false )}}><a href="/portfolio">Portfolio</a></li>
                <li {{( Request::segment('1') == 'blog' ? 'class=current' : false )}}><a href="/blog">Blog</a></li>
                <li {{( Request::segment('1') == 'contact' ? 'class=current' : false )}}><a href="/contact">Contact</a></li>

                <li class="flexGrow"></li>
                <li><div class="toggle {{( isset($_COOKIE['darkTheme']) && $_COOKIE['darkTheme'] ? 'active' : false )}}"></div></li>
                <li><a href="https://github.com/wilxiteMike" target="_blank" title="My GitHub Profile"><img src="https://github.com/wilxiteMike.png?size=20" /></a></li>

            </ul>

        </div>

        <div id="body">
        
            <h1>@yield('pageTitle')</h1>
            <h3>@yield('description')</h3>
        
            @yield('content')

        </div>

    </body>
    
</html>