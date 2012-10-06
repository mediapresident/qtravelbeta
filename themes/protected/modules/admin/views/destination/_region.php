<?php

return array(
    'title'=>'Edit Region',
 
    'elements'=>array(
        'name'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'description' => array(
            'type' => 'textarea',
            
        ),
        '',
        '<h2>SEO</h2>'
        ,
        'title'=>array(
            'type'=>'textarea',
            'maxlength'=>220,
            'class' => 'small'
        ),
        'meta_keywords'=>array(
            'type'=>'textarea',
            'maxlength' => 220,
            'class' => 'small'
        ),
        'meta_description'=>array(
            'type'=>'textarea',
            'maxlength' => 220,
            'class' => 'small'
        )
    ),
 
    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Save',
        ),
    ),
);
?>
