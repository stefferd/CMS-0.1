<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>SVO Korfbal Ooij - Svokorfbal.nl</title>
    <meta name="Identifier-URL" content="SVO Korfbal Ooij" />
    <meta http-equiv="content-language" content="EN-en" />
    <meta name="revisit-after" content="5" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="noodp" />
    <meta name="copyright" content="&copy; SVO Korfbal Ooij" />
    <meta name="language" content="Dutch" />
    <meta name="author" content="SVO Korfbal Ooij" />
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
    <header>
        {include file='menu.tpl'}
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