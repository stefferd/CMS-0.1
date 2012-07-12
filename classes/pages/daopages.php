<?php
/**
 * Created by JetBrains PhpStorm.
 * User: s.van.den.berg
 * Date: 17-4-12
 * Time: 21:16
 * To change this template use File | Settings | File Templates.
 */
require_once('./classes/settings.php');

require_once(classes . 'db.php');
require_once(classes . 'pages/pages.php');
require_once(classes . 'pages/intdaopages.php');

class DaoPages implements IntDaoPages
{
    public function delete($id) {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('DELETE FROM pages WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $db->mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function save(Pages $pages)
    {
        $this->checkTableIsPresent();
        $pages->setId($this->getMaxId());

        $db = new Db();
        if ($smtm = $db->mysqli->prepare('INSERT INTO pages SET id = ?, uniqueid = ?, title = ?, text = ?, metatitle = ?,
            metadescription = ?, keywords = ?, active = ?, created = ?, user = ?, version = ?')) {
            $smtm->bind_param('issssssisii',
                $pages->getId(),
                $pages->getUniqueid(),
                $pages->getTitle(),
                $pages->getText(),
                $pages->getMetatitle(),
                $pages->getMetadescription(),
                $pages->getKeywords(),
                $pages->getActive(),
                time(),
                $pages->getUser(),
                $pages->getVersion()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
        return $pages->getId();
    }

    public function update(Pages $pages)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('UPDATE pages SET uniqueid = ?, title = ?, text = ?, metatitle = ?,
            metadescription = ?, keywords = ?, active = ?, updated = ?, user = ?, version = ? WHERE id = ?')) {
            $smtm->bind_param('ssssssisiii',
                $pages->getUniqueid(),
                $pages->getTitle(),
                $pages->getText(),
                $pages->getMetatitle(),
                $pages->getMetadescription(),
                $pages->getKeywords(),
                $pages->getActive(),
                time(),
                $pages->getUser(),
                $pages->getVersion(),
                $pages->getId()
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }

    public function get(Pages $pages, $id)
    {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT id, uniqueid, title, text, metatitle, metadescription, keywords, active, created, updated, user, version FROM pages WHERE id = ?')) {
            $smtm->bind_param('i', $id);
            $smtm->execute();
            $smtm->bind_result($id, $uniqueid, $title, $text, $metatitle, $metadescription, $keywords, $active, $created ,$updated, $user, $version);
            while ($smtm->fetch()) {
                $pages->setId($id);
                $pages->setUniqueid($uniqueid);
                $pages->setTitle($title);
                $pages->setText($text);
                $pages->setMetatitle($metatitle);
                $pages->setMetadescription($metadescription);
                $pages->setKeywords($keywords);
                $pages->setActive($active);
                $pages->setCreated($created);
                $pages->setUpdated($updated);
                $pages->setUser($user);
                $pages->setVersion($version);
            }
            $db->mysqli->close();
        }
    }

    public function getEntries() {
        $entries = array();
        $db = new Db();

        if ($smtm = $db->mysqli->prepare('SELECT id, uniqueid, title, text, metatitle, metadescription, keywords, active, created, updated, user, version FROM pages')) {
            $smtm->execute();
            $smtm->bind_result($id, $uniqueid, $title, $text, $metatitle, $metadescription, $keywords, $active, $created ,$updated, $user, $version);
            while ($smtm->fetch()) {
                $pages = new Pages();
                $pages->setId($id);
                $pages->setUniqueid($uniqueid);
                $pages->setTitle($title);
                $pages->setText($text);
                $pages->setMetatitle($metatitle);
                $pages->setMetadescription($metadescription);
                $pages->setKeywords($keywords);
                $pages->setActive($active);
                $pages->setCreated($created);
                $pages->setUpdated($updated);
                $pages->setUser($user);
                $pages->setVersion($version);
                array_push($entries, $pages);
            }
            $db->mysqli->close();
        }
        return $entries;
    }
    
    /* Private functions */

    private function getMaxId() {
        $db = new Db();
        if ($smtm = $db->mysqli->prepare('SELECT MAX(id) as lastid FROM pages')) {
            $smtm->execute();
            $smtm->bind_result($id);
            $smtm->fetch();
            $smtm->close();
            if ($id && $id > 0) {
                $id += 1;
            } else {
                $id = 1;
            }
        } else { $id = 1; }
        $db->mysqli->close();

        return $id;
    }

    private function checkTableIsPresent() {
        $db = new Db();
        if ($db->mysqli->prepare('SELECT * FROM pages')) {
            return true;
        } else {
            $smtm = $db->mysqli->prepare('CREATE TABLE IF NOT EXISTS `pages`
              (
                `id` int(11) NOT NULL,
                `uniqueid` varchar(250) NOT NULL,
                `title` varchar(250) NOT NULL,
                `text` TEXT NULL,
                `metatitle` varchar(250) NULL,
                `metadescription` TEXT NULL,
                `keywords` TEXT NULL,
                `active` int(11) NOT NULL default \'1\',
                `created` varchar(40) NULL,
                `updated` varchar(40) NULL,
                `user` int(11) NOT NULL default \'0\',
                `version` int(11) NOT NULL default \'1\',
                PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;'
            );
            $smtm->execute();
            $smtm->close();
        }
        $db->mysqli->close();
    }
}
