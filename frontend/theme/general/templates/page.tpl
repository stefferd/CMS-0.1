<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Startpagina - InternationalKartParts.nl</title>
    <meta name="Identifier-URL" content="InternationalKartParts" />
    <meta http-equiv="content-language" content="EN-en" />
    <meta name="revisit-after" content="5" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="noodp" />
    <meta name="copyright" content="&copy; InternationalKartParts" />
    <meta name="language" content="Dutch" />
    <meta name="author" content="InternationalKartParts" />
    <meta name="web_author" content="Van den Berg Multimedia" />
    <link rel="shortcut icon" href="{$url}{$theme}images/favicon.ico" type="image/x-icon" />
    <script src="{$url}{$theme}javascript/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="{$url}{$theme}javascript/jquery.roundabout.min.js" type="text/javascript"></script>
    <script src="{$url}{$theme}javascript/default-controller.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{$url}{$theme}css/style.css" type="text/css" media="screen" />
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="{$url}{$theme}css/ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body>
    {include file='menu.tpl'}
    <header>
        <ul>
            <li><img src="{$url}{$theme}images/banner/banner-1.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-2.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-3.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-4.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-5.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-6.jpg" alt="InternationalKartParts" border="0" /></li>
            <li><img src="{$url}{$theme}images/banner/banner-7.jpg" alt="InternationalKartParts" border="0" /></li>
        </ul>
    </header>
    <section>
        <div class="content">
            {$content}
        </div>
        <aside>
            {$snippet}
        </aside>
    </section>
    {include file="footer.tpl"}
</body>
</html>