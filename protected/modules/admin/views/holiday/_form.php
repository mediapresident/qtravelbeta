<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'holiday-form',
    'enableAjaxValidation' => false,
    'focus' => array($model, 'title'),
    'htmlOptions' => array(
        'class' => 'form',
    ),
        ));
?>

<div class="group">
        <?php if ($model->hasErrors('name')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'name', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('name')): ?>
            <span class="error"><?php echo $model->getError('name'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 256, 'class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('description')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'description', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('description')): ?>
            <span class="error"><?php echo $model->getError('description'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('image')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'image', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('image')): ?>
            <span class="error"><?php echo $model->getError('image'); ?></span>
        </div>
<?php endif; ?>
<?php echo Q::getImagePlaceHolder($model->image, $form->hiddenField($model, 'image'), 'holiday'); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('url')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'url', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('url')): ?>
            <span class="error"><?php echo $model->getError('url'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 256, 'class' => 'text_field')); ?>
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
<?php echo $form->textField($model, 'title', array('size' => 60,  'class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('heading')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'heading', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('heading')): ?>
            <span class="error"><?php echo $model->getError('heading'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'heading', array('size' => 60, 'class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('meta_keywords')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('meta_keywords')): ?>
            <span class="error"><?php echo $model->getError('meta_keywords'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'class' => 'text_field')); ?>
</div>

<div class="group">
        <?php if ($model->hasErrors('meta_description')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'meta_description', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('meta_description')): ?>
            <span class="error"><?php echo $model->getError('meta_description'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textField($model, 'meta_description', array('size' => 60, 'class' => 'text_field')); ?>
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
<?php echo $form->textField($model, 'position', array('size' => 5, 'class' => 'text_field')); ?>
</div>


<div class="group">
<?php
$this->widget(
      'ext.emultiselect.EMultiSelect',
      array('sortable'=>true, 'searchable'=>true)
);
echo $form->dropDownList(
    $model,
    'map',
    CHtml::listData(Hotel::model()->findAll(), 'id', 'name'),
    array('multiple'=>'multiple',
        'key'=>'hotel_id', 'class'=>'multiselect')
);
?>
</div>


    <label class="label">Hotel Descriptions (Please save holiday before editing the hotel description)</label>
    <?php foreach($model->map as $m):?>
    <?php if($m->hotel):?>
    <div class="group">
        <label class="label"><?php echo $m->hotel->name?> - description</label>
        <?php echo CHtml::textArea('description['.$m->hotel->id.']',$m->description, array('rows' => 6, 'cols' => 50, 'class' => 'text_area'));?>
    </div>
    <?php endif; ?>
    <?php endforeach;?>
<div class="group navform wat-cf">
    <button class="button" type="submit">
    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
    </button>
    <span class="text_button_padding">or</span>
<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
</div>
<?php $this->endWidget(); ?>