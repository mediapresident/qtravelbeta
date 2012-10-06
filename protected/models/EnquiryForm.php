<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class EnquiryForm extends CFormModel {

    public $name, $email, $phone, $country, $dates, $size, $comment, $subscribe, $url, $human;

    public function rules() {
        return array(
            array('name', 'required'),
            array('email', 'required', 'on' => 'subscribe'),
            array('human', 'isEmpty'),
            array('email', 'email'),
            array('email', 'checkSpam'),
            array('phone', 'required', 'on' => 'callback'),
            array('email, phone', 'required', 'on' => 'enquire'),
            array('name,email,phone,country,dates,size,comment, subscribe, url', 'safe')
        );
    }

    public function isEmpty($attribute, $param) {
        $a = $this->$attribute;
        $a = trim($a);
        if (!empty($a)) {
            $this->addError($attribute,'');
        }
    }

    public function checkSpam($attribute, $param) {
        $banned = array(
            'aderispharm.com'
        );
        $e = explode('@',$this->$attribute);
        if(in_array($e[1], $banned)){
            $this->addError($attribute, 'error');
        }
    }
    public function attributeLabels() {
        return array(
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'country' => 'Country of origin',
            'dates' => 'Travel Dates', 
           'size' => 'Party Size',
            'comments' => 'Comments',
            'hotel' => 'URL'
        );
    }

}

?>