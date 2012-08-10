<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 21-07-2012
     * index page of the CMS 1.1 project frontend
     */
    session_start();

    try {
        include('./classes/settings.php');
        include(smarty_dir . 'Smarty.class.php');
        include(profile_controller . 'libs/setup.php');
        include(profile_controller . 'libs/profile.php');
        include(profile_controller . 'libs/user.php');
        include(pages_controller . 'libs/setup.php');
        include(pages_controller . 'libs/pages.php');
        include(snippet_controller . 'libs/setup.php');
        include(snippet_controller . 'libs/snippet.php');

        $smarty = new Smarty();
        $smarty->setTemplateDir('theme/general/templates');
        $smarty->setCompileDir('theme/general/templates_c');
        $smarty->assign('url', url);
        $smarty->assign('theme', theme);
        $smarty->assign('version', version);

        //Get the querystring attributes
        $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'startpagina';
        $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
        $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

        $content = '';
        $snippet = '';

        $cpages = new PagesController();
        $csnippet = new SnippetController();
        switch($_module) {
            case 'contact':
                $content = $cpages->getEntry($_module);
                $smarty->assign('snippet_required', $csnippet->getByUniqueid('velden-verplicht'));
                $content .= $smarty->fetch('contact-form.tpl');
                $snippet = $csnippet->getByUniqueid('contact-gegevens');
                break;
            default:
                $content = $cpages->getEntry($_module);
                $snippet = $csnippet->getByUniqueid('advies-nodig');
                break;
        }

        $smarty->assign('content', $content);
        $smarty->assign('snippet', $snippet);
        $smarty->display('page.tpl');
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
?>