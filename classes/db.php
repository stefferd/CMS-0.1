<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stef van den Berg
 * Date: 09-04-12
 * Time: 11:53
 */
class Db
{
    public $mysqli = null;
    /*
    const host = 'localhost';
    const username = 'tsadmin_tsadmin';
    const password = 'Tsadmin1121';
    const database = 'tsadmin_main';
    */
    const host = 'localhost';
    const username = 'cmsadmin';
    const password = '@dmin';
    const database = 'cms';

    public function Db() {
        /* default constructor */
        $this->mysqli = new mysqli($this::host, $this::username, $this::password, $this::database);
    }
}
