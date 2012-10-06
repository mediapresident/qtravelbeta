<?php

function strip_quotes($text) {
    stripslashes($text);
    $text = str_replace(
            array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"), array("'", "'", '"', '"', '-', '--', '...'), $text);
// Next, replace their Windows-1252 equivalents.
    $text = str_replace(
            array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)), array("'", "'", '"', '"', '-', '--', '...'), $text);
    $text = preg_replace("/[^\x9\xA\xD\x20-\x7F]/", "", $text);
    return stripslashes($text);
}

class DefaultController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        /**
          $pages = Page::model()->findAll();
          foreach($pages as $page){
          $page->content = stripslashes(utf8_decode($page->content));
          $page->save();

          }

          $hotels = Hotel::model()->findAll();
          foreach($hotels as $hotel){
          $hotel->description = stripslashes(utf8_decode($hotel->description));
          $hotel->save();
          }

          $it = Itinerary::model()->findAll();
          foreach($it as $i){
          $i->full_text = stripslashes(utf8_decode($i->full_text));
          $i->save();
          }

          $hotels = Hotel::model()->findAll();
          foreach ($hotels as $hotel) {
          $hotel->description = strip_quotes($hotel->description);
          $hotel->save();
          }
          $hotel = Hotel::model()->findByPk(13500);
          echo strip_quotes($hotel->description);
          Yii::app()->end();

         *  * */
        $this->redirect('/admin/page');
        Yii::app()->end();
        $this->render('index');
    }

    public function actionFixQ() {
        $hotels = Hotel::model()->findAll();
        foreach ($hotels as $hotel) {
            $hotel->key_points = "<p>".str_replace("<br>", "</p><p>", strip_quotes($hotel->key_points))."</p>";
            $hotel->save();
        }
    }

}