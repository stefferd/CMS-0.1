<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:38
 */
define('host', 'localhost');
define('username', 'deb33946_svoad');
define('password', 'SvoKorfb@l');
define('database', 'deb33946_svo');

define('cms', 'http://www.mmcms.net/' . version . '/');
//define('url', 'http://www.internationalkartparts.nl/');
define('url', 'http://mmcms.net/svokorfbal/');
define('theme', 'theme/default/');
define('version', '1.1');

define('classes', '../' . version . '/shared/classes/');
define('smarty_dir', '../' . version . '/shared/libs/smarty/');

define('general_controllers', '../' . version . '/shared/controllers/general/');

define('profile_class', classes . 'profile/');
define('profile_controller', '../' . version . '/shared/controllers/profile/');

define('pages_class', classes . 'pages/');
define('pages_controller', '../' . version . '/shared/controllers/pages/');

define('snippet_class', classes . 'snippet/');
define('snippet_controller', '../' . version . '/shared/controllers/snippet/');