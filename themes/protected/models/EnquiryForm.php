<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class EnquiryForm extends CFormModel
{
    public $name, $email, $phone, $country, $dates, $size, $comment, $subscribe;
    public function rules(){
        return array(
            array ('name', 'required'),
            array('email', 'required', 'on' => 'subscribe'),
            array('email','email'),
            array('phone', 'required', 'on' => 'callback') ,
            array('name,email,phone,country,dates,size,comment, subscribe', 'safe')
        );
    }
    
    public function attributeLabels(){
        return array(
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'country' => 'Country of origin',
            'dates' => 'Travel Dates',
            'size' => 'Party Size',
            'comments' => 'Comments'
        );
    }
}
?>