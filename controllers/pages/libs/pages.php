<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 19-6-12
 * Time: 22:10
 */
require(classes . 'pages/pages.php');
require(classes . 'pages/daopages.php');

class PagesController {
    private $pages = null;
    private $daopages = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new PagesSmarty();
        $this->pages = new Pages();
        $this->daopages = new DaoPages();
    }

    public function save($formvars = array()) {
        $this->pages->setUniqueid($this->prepareUniqueid(trim($formvars['title'])));
        $this->pages->setTitle(trim($formvars['title']));
        $this->pages->setText($formvars['text']);
        $this->pages->setMetatitle($formvars['metatitle']);
        $this->pages->setMetadescription($formvars['metadescription']);
        $this->pages->setKeywords($formvars['keywords']);
        $active = ($formvars['keywords'] == 'on') ? 1 : 0;
        $this->pages->setActive($active);

        $this->daopages->save($this->pages);
    }

    public function update($formvars = array(), $id) {
        $this->pages->setUniqueid($this->prepareUniqueid(trim($formvars['title'])));
        $this->pages->setTitle(trim($formvars['title']));
        $this->pages->setText($formvars['text']);
        $this->pages->setMetatitle($formvars['metatitle']);
        $this->pages->setMetadescription($formvars['metadescription']);
        $this->pages->setKeywords($formvars['keywords']);
        $active = ($formvars['keywords'] == 'on') ? 1 : 0;
        $this->pages->setActive($active);

        $this->daopages->update($this->pages, $id);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function create($formvars = array()) {
        $this->tpl->assign('post', $formvars);
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('form.tpl');
    }

    public function getEntries() {
        return $this->daopages->getEntries();
    }

    private function prepareUniqueid($title) {
        $title = str_replace(' '  , '-', $title);
        $title = str_replace('\'' , '' , $title);
        $title = str_replace('"'  , '' , $title);
        $title = str_replace('/'  , '' , $title);
        $title = str_replace('\\' , '' , $title);
        
        return $title;
    }
}