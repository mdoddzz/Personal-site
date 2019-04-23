<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/dark.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <title>Admin - @yield('headTitle') - Micahel Dodd</title>
</head>
<body>

    <div id="header">

        <ul class="headerNav">

            <li {{( Request::segment('1') == 'admin' ? 'class=current' : false )}}><a href="/admin">Dashboard</a></li>
            <li {{( Request::segment('2') == 'pages' ? 'class=current' : false )}}><a href="/admin/pages">Pages</a></li>
            <li {{( Request::segment('2') == 'blog' ? 'class=current' : false )}}><a href="/admin/blog">Blog Posts</a></li>
            <li {{( Request::segment('2') == 'contact' ? 'class=current' : false )}}><a href="/admin/contactRequests">Contact Requests</a></li>

            <li class="flexGrow"></li>
            <li><div class="toggle"></div></li>
            <li><a href="https://github.com/wilxiteMike" target="_blank" title="My GitHub Profile"><img src="" /></a></li>

        </ul>

    </div>


    <div id="body">
    
       

    </div>

</body>
</html>