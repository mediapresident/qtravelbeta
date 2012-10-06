<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'hotel-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'focus' => array($model, 'name'),
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
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 220, 'class' => 'text_field')); ?>
</div>
<!--		
        <div class="group">
<?php if ($model->hasErrors('holiday_group')): ?>
                            <div class="fieldWithErrors">
<?php endif; ?>
<?php echo $form->labelEx($model, 'holiday_group', array('class' => 'label')); ?>
<?php if ($model->hasErrors('holiday_group')): ?>
                                    <span class="error"><?php echo $model->getError('holiday_group'); ?></span>
                            </div>
<?php endif; ?>
<?php echo $form->textField($model, 'holiday_group', array('class' => 'text_field')); ?>
        </div>
-->		
<div class="group">
        <?php if ($model->hasErrors('city_id')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'city_id', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('city_id')): ?>
            <span class="error"><?php echo $model->getError('city_id'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'city_id', CHtml::listData(City::model()->findAll(array('order' => 'name ASC')), 'id', 'name') ); ?>
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
        <?php if ($model->hasErrors('key_points')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'key_points', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('key_points')): ?>
            <span class="error"><?php echo $model->getError('key_points'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->textArea($model, 'key_points', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
</div>



<div class="group">
        <?php if ($model->hasErrors('status')): ?>
        <div class="fieldWithErrors">
        <?php endif; ?>
<?php echo $form->labelEx($model, 'status', array('class' => 'label')); ?>
    <?php if ($model->hasErrors('status')): ?>
            <span class="error"><?php echo $model->getError('status'); ?></span>
        </div>
<?php endif; ?>
<?php echo $form->dropDownList($model, 'status', array('active' => 'active', 'disabled' => 'disabled')); ?>
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
<?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 220, 'class' => 'text_field')); ?>
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
<?php echo $form->textField($model, 'meta_description', array('size' => 60, 'maxlength' => 220, 'class' => 'text_field')); ?>
</div>

<div class="group">
    <label class="label">Images (click on the image to make it a Featured Image)</label>
    <?php
        $images = CHtml::listData($model->images, 'id', 'main_url');
        echo Q::getMultiImagePlaceHolders($images, 'Hotel[images]', 'hotel', 1);
        if($f = $model->featuredImage){
            $featured = basename($f->main_url);
        }else{
            $featured = basename(array_pop($images));
        }
        echo CHtml::hiddenField('featured',$featured, array('class' => 'featured'));
    ?>
</div>

<div class="group navform wat-cf">
    <button class="button" type="submit">
    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
    </button>
    <span class="text_button_padding">or</span>
<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
</div>
<?php $this->endWidget(); ?>
