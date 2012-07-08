<?php
    /*
     * Author: Stef van den Berg
     * Updated on: 19-06-2012
     * index page of the hobbeezz project
     */
    session_start();

    include('./classes/settings.php');
    include(smarty_dir . 'Smarty.class.php');
    include(profile_controller . 'libs/setup.php');
    include(profile_controller . 'libs/profile.php');
    include(pages_controller . 'libs/setup.php');
    include(pages_controller . 'libs/pages.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MMCMS - 1.1</title>
        <link media="screen" rel="stylesheet" href="<?php echo url . theme; ?>css/style.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="<?php echo url . theme; ?>javascript/jquery-1.7.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo url . theme; ?>javascript/default-controller.js"></script>
    </head>
    <body>
        <section>
        <?php
            $_module = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'start';
            $_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';
            $_item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';

            $cprofile = new ProfileController();

            // Show loggedin or login form
            if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                $cprofile->miniProfile($_SESSION['id']);
            } else { $cprofile->login(); }

            switch($_module) {
                case 'pages':
                    $cpages = new PagesController();
                   switch($_action) {
                        case 'create':
                            $cpages->create($_POST);
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
                case 'profile':
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
                        case 'logout':
                            $cprofile->logout();
                        case 'view':
                        default:
                            $cprofile->login($_SESSION['id']);
                            break;
                    }
                    break;
            }
        ?>
        </section>
    </body>
</html>