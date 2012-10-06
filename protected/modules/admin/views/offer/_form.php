<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'offer-form',
    'enableAjaxValidation' => false,
    'focus' => array($model, 'hotel_id'),
    'htmlOptions' => array(
        'class' => 'form',
    ),
        ));
?>

<div class="group">
        <?php if ($model->hasErrors('hotel_id')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'hotel_id', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('hotel_id')): ?>
            <span class="error"><?php echo $model->getError('hotel_id'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'hotel_id', CHtml::listData(Hotel::model()->findAll(), 'id', 'name')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('continent_code')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'continent_code', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('continent_code')): ?>
            <span class="error"><?php echo $model->getError('continent_code'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'continent_code', CHtml::listData(Continent::model()->findAll(), 'code', 'code')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('title')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'title', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('title')): ?>
            <span class="error"><?php echo $model->getError('title'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'title', array('class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('offer')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'offer', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('offer')): ?>
            <span class="error"><?php echo $model->getError('offer'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textArea($model, 'offer', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
</div>


<div class="group">
        <?php if ($model->hasErrors('position')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'position', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('position')): ?>
            <span class="error"><?php echo $model->getError('position'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'position', array('class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('showonhp')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'showonhp', array('class' => 'enabled'), 'label'); ?>
    <?php if ($model->hasErrors('showonhp')): ?>
            <span class="error"><?php echo $model->getError('showonhp'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'showonhp', array(0 => 'No', 1 => 'Yes')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('live')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'live', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('live')): ?>
            <span class="error"><?php echo $model->getError('live'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'live', array(0 => 'disabled', 1 => 'enabled'), array('class' => 'text_field')); ?>
</div>

<div class="group navform wat-cf">
    <button class="button" type="submit">
    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
    </button>
    <span class="text_button_padding">or</span>
<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
</div>
<?php $this->endWidget(); ?>