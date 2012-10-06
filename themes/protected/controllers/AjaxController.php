<?php

class AjaxController extends Controller {

    public function actionCity() {
        if(isset($_POST['country'])){
            $c = new CDbCriteria;
            $c->addCondition('country_id = :country');
            $c->params[':country'] = $_POST['country'];
            $opt = array('prompt' => '-- Location --');
            echo CHtml::listOptions('',CHtml::listData(City::model()->findAll($c), 'id', 'name'), $opt);
        }
    }

    public function actionCountry() {
        if(isset($_POST['region'])){
            
            $c = new CDbCriteria;
            $c->addCondition('region_id = :region');
            $c->params[':region'] = $_POST['region'];
            $opt = array('prompt' => '-- Country --');
            echo CHtml::listOptions('',
                    CHtml::listData(Country::model()->findAll($c), 'id', 'name'),
                    $opt);
        }
    }

    public function actionHotels() {
        $this->render('hotels');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}