<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
require_once('classes/settings.php');
require_once(classes. '/pages/pages.php');

interface IntDaoPages
{
    public function save(Pages $pages);
    public function update(Pages $pages, $id);
    public function delete($id);
    public function get(Pages $pages, $id);
    public function getEntries();
}
