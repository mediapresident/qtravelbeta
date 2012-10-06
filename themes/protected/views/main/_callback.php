<div class="form">
    <?php
    $enquire = $this->callbackForm;
    $form = $this->beginWidget('CActiveForm', array('action' => '/ajax/enquire'));
    ?>
    
    <div class="box"></div>
    <div class="box"><?php echo $form->textField($enquire, 'name', array('placeholder' => 'Name'));?></div>
    <div class="box"><?php echo $form->textField($enquire, 'email', array('placeholder' => 'Email'));?></div>
    <div class="box"><?php echo $form->textField($enquire, 'phone', array('placeholder' => 'Phone'));?></div>
    <?php if(isset($combine)):?>
    <div class="box yellow"><?php echo $form->checkBox($enquire, 'subscribe');?>Subscribe to the Newsletter</div>
    <?php endif;?>
    <div class="box small"><?php echo CHtml::ajaxSubmitButton('Submit','/ajax/enquire',array('complete' => "openDialog"));?></div>
    <?php
    $this->endWidget();
    ?>
</div>