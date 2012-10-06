
<?php

$this->widget('ext.jcrop.EJcrop', array(
    //
    // Image URL
    'url' => $this->createAbsoluteUrl($image),
    //
    // ALT text for the image
    'alt' => 'Crop This Image',
    //
    // options for the IMG element
    'htmlOptions' => array('id' => 'imageId', 'style' => 'max-width: 960px; max-height: 460px;'),
    //
    // Jcrop options (see Jcrop documentation)
    'options' => array(
        'minSize' => $minSize,
        'aspectRatio' => $minSize[0]/$minSize[1],
        'setSelect' => array(0,0,$minSize[0], $minSize[1]),
        'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
        'trueSize' => $trueSize
    ),
    // if this array is empty, buttons will not be added
    'buttons' => array(
        'start' => array(
            'label' =>  'Start cropping',
            'htmlOptions' => array(
                'class' => 'myClass',
                'style' => 'color:red;' // make sure style ends with « ; »
            )
        ),
        'crop' => array(
            'label' => 'Save cropping',
        ),
        'cancel' => array(
            'label' =>  'Cancel cropping'
        )
    ),
    // URL to send request to (unused if no buttons)
    'ajaxUrl' => '/admin/image/savecrop',
    //
    // Additional parameters to send to the AJAX call (unused if no buttons)
    'ajaxParams' => array('image' => basename($image), 'type' => $type)
)); 
?>
