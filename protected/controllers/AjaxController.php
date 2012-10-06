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
    
    public function actionHotels(){
        if(isset($_GET['term'])){
            $c = new CDbCriteria();
            $c->compare('LOWER(t.name)', strtolower($_GET['term']), true, 'OR');
            $c->addCondition('status = :status');
            $c->params[':status'] = 'active';
            $c->limit = 5;
            $hotels = Hotel::model()->findAll($c);
            $output = array();
            foreach($hotels as $hotel){
                
                $output[] = array('id' => $hotel->id, 'label' => $hotel->name, 'value' => $hotel->name, 'url' => '/hotel/'.$hotel->id.'-'.Q::slug($hotel->name).'?utm_source=quicksearch&utm_medium=parent');
            }
            echo json_encode($output);
        }
    }

    public function actionEnquire() {
        if(isset($_POST['EnquiryForm']) && isset($_POST['on'])){
            
            $form = new EnquiryForm($_POST['on']);
            $form->attributes = $_POST['EnquiryForm'];
            if($form->validate()){
                $output['success'] = 1;
                if($_POST['on'] == 'subscribe')$output['message'] = "Thank you for Subscribing to our newsletter.";
                else if($_POST['on'] == 'callback')$output['message'] = "Thank you for requesting a callback.<br/> One of our lifestyle travel Managers will be in touch shortly";
                else $output['message'] = "Many thanks for your enquiry. One of our Lifestyle Travel Managers will be in touch shortly.";
                if($_POST['on'] != 'subscribe')mail(Yii::app()->params['adminEmail'], $_POST['on']. " - Quintessentially Travel - ".Q::formatSubject($form->attributes), Q::formatMail($form->attributes), "From: Web Enquiry <web@quintessentiallytravel.com>");
                
                
                $msgText = "Dear ".$form->name." \n\n
Many thanks for your enquiry. One of our Lifestyle Travel Managers will respond shortly.\n\n
Quintessentially Travel was born from the ethos that no one person on this earth is the same, so we believe no holiday we create should be the same. As masters of travel couture, we tailor-make each experience the world-over, providing you with exclusive access to the globe's finest hotels, villas and retreats. Of course, we will also make sure you arrive in style be it by private or commercial jet, a luxury cruise ship or even on the back of an Indian elephant! From the ordinary to the extraordinary, the known to the unknown, we don't just create holidays; we create experiences that last a lifetime!\n\n
Warmest regards \n 
Quintessentially Travel\n
www.QuintessentiallyTravel.com";
            $headers = "From: Quintessentially Travel <info@quintessentiallytravel.com>";    
                if($_POST['on'] != 'subscribe' && $form->email ){
                    mail($form->email, "Many thanks for your enquiry", $msgText, $headers);
                }
                
                if($_POST['on'] == 'subscribe' || $form->subscribe == 1){
                    Q::subscribe($form, $this->region);
                }
            }else{
                
                $output['error'] = 1;
                $output['message'] = CHtml::errorSummary($form);
            }
            echo json_encode($output);
        }
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