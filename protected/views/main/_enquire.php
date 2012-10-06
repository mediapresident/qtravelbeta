<div class="form">
    <?php
    $enquire = new EnquiryForm();
    $form = $this->beginWidget('CActiveForm', array('action' => '/ajax/enquire'));
    ?>
    <div class="box"><?php echo $form->textField($enquire, 'name', array('placeholder' => 'Name')); ?></div>
    <div class="box"><?php echo $form->textField($enquire, 'email', array('placeholder' => 'Email')); ?></div>
    <div class="box"><?php echo $form->textField($enquire, 'phone', array('placeholder' => 'Phone')); ?></div>
    <div class="box"><?php echo $form->textField($enquire, 'country', array('placeholder' => 'Country of origin')); ?></div>
    <div class="box"><?php echo $form->textField($enquire, 'dates', array('placeholder' => 'Travel Dates')); ?></div>
    <div class="box"><?php echo $form->textField($enquire, 'size', array('placeholder' => 'Party Size')); ?></div>
    <div class="box"><?php echo $form->textArea($enquire, 'comment', array('placeholder' => 'Comment')); ?></div>
    <div id="hu" class="box"><?php echo $form->textField($enquire, 'human', array('placeholder' => 'Human', 'value' => ' '));?></div>
    <?php echo $form->hiddenField($enquire, 'url', array('value' => $url) ); ?>
    <?php echo CHtml::hiddenField('on', 'enquire'); ?>
    <div class="box rt"><?php echo CHtml::ajaxSubmitButton('Submit Enquiry', '/ajax/enquire', array('success' => "openDialog", 'dataType' => 'json')); ?></div>
    <?php
    $this->endWidget();
    ?>
</div>