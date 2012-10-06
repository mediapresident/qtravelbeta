<?php

class DestinationController extends Controller {

    public $layout = '//layouts/main';

    public function actionCities() {
        $this->render('cities');
    }

    public function actionCity() {
        $this->render('city');
    }

    public function actionCountries() {
        $this->render('countries');
    }

    public function actionCountry() {
        $this->render('country');
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionRegion() {
        if(isset($_GET['id'])){
            $data['region'] = Region::model()->findByPk($_GET['id']);
        }else{
            $data['region'] = new Region;
        }
        
        if(isset($_POST['Region'])){
            $data['region']->attributes = $_POST['Region'];
            if($data['region']->save()){
                Yii::app()->user->setFlashMessage('Success','Saved successfully');
            }
        }
        
        $data['form'] = new CForm('application.modules.admin.views.destination._region', $data['region']);
        $this->render('region', $data);
    }

    public function actionRegions() {
        $this->render('regions');
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