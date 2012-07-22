<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 19-06-2012
     * index page of the CMS 1.1 project
     */
    session_start();

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
    $smarty->setTemplateDir(general_controllers . 'templates');
    $smarty->setCompileDir(general_controllers . 'templates_c');
    $smarty->assign('url', url);
    $smarty->assign('theme', theme);
    $smarty->assign('version', version);
    $smarty->display('header.tpl');

    //Get the querystring attributes
    $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'start';
    $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
    $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

    //Check if the user is loggedin
    $cprofile = new ProfileController();
    if ($_module == 'profile' && $_action == 'logout') {
        $cprofile->logout();
    } else {
        if ($_module == 'profile') {
            switch($_action) {
                case 'subscribe':
                    $cprofile->subscribe($_POST);
                    break;
                case 'subscription':
                    $cprofile->mungeFormData($_POST);
                    $cprofile->save($_POST);
                    break;
                case 'activation':
                    $cprofile->activate($_item);
                    break;
                case 'login':
                    $cprofile->checkLogin($_POST);
                    break;
            }
        }
    }

    if ($_SESSION['LOGIN'] && ($_module != 'profile' && $_action != 'logout')) {
        $cprofile->miniProfile($_SESSION['id']);
    } else { $cprofile->login(); }

    //Only show when the user is loggedin
    if ($_SESSION['LOGIN']) {
        $smarty->display('menu.tpl');
        switch($_module) {
            case 'pages':
                $cpages = new PagesController();
               switch($_action) {
                    case 'create':
                        $cpages->create($_POST);
                        break;
                    case 'delete':
                        if ($cpages->remove($_item)) {
                            $cpages->view($cpages->getEntries());
                        }
                        break;
                    case 'edit':
                        $cpages->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cpages->update($_POST, $_item);
                        $cpages->view($cpages->getEntries());
                        break;
                    case 'save':
                        $cpages->save($_POST);
                        $cpages->view($cpages->getEntries());
                        break;
                    case 'view':
                    default:
                        $cpages->view($cpages->getEntries());
                        break;
                }
                break;
            case 'snippet':
                $csnippet = new SnippetController();
                switch($_action) {
                    case 'create':
                        $csnippet->create($_POST);
                        break;
                    case 'delete':
                        if ($csnippet->remove($_item)) {
                            $csnippet->view($csnippet->getEntries());
                        }
                        break;
                    case 'edit':
                        $csnippet->edit($_POST, $_item);
                        break;
                    case 'update':
                        $csnippet->update($_POST, $_item);
                        $csnippet->view($csnippet->getEntries());
                        break;
                    case 'save':
                        $csnippet->save($_POST);
                        $csnippet->view($csnippet->getEntries());
                        break;
                    case 'view':
                    default:
                        $csnippet->view($csnippet->getEntries());
                        break;
                }
                break;
            case 'users':
               $cuser = new UserController();
               switch($_action) {
                    case 'create':
                        $cuser->create($_POST);
                        break;
                    case 'delete':
                        if ($cuser->delete($_item)) {
                            $cuser->view($cuser->getEntries());
                        }
                        break;
                    case 'edit':
                        $cuser->edit($_POST, $_item);
                        break;
                    case 'update':
                        $cuser->update($_POST, $_item);
                        $cuser->view($cuser->getEntries());
                        break;
                    case 'save':
                        $cuser->save($_POST);
                        $cuser->view($cuser->getEntries());
                        break;
                    case 'view':
                    default:
                        $cuser->view($cuser->getEntries());
                        break;
                }
                break;
        }
    }

    $smarty->display('footer.tpl');
?>