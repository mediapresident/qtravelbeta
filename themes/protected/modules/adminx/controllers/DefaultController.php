<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $c = new CDbCriteria;
        $c->with = array('countries');
        $region = Region::model()->findAll($c);
        foreach ($region as $r) {
            print_r($r->attributes);
        }
        $this->render('index');
    }

    public function actionHotel() {
        $c = new CDbCriteria;
        $page = Pages::model()->findByPk(93);
        $page->description = utf8_decode(utf8_decode($page->description));
        $page->content = stripslashes($page->content);
        
        print_r($page->attributes);
    }

}