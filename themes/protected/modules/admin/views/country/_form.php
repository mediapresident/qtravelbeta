<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'country-form',
	'enableAjaxValidation' => false,
	'focus' => array($model, 'name'),
	'htmlOptions' => array(
		'class' => 'form',
	),
)); ?>
		
	<div class="group">
		<?php if($model->hasErrors('name')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'name', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('name')): ?>
				<span class="error"><?php echo $model->getError('name'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 220, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('region_id')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'region_id', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('region_id')): ?>
				<span class="error"><?php echo $model->getError('region_id'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->dropDownList($model, 'region_id', CHtml::listData(Region::model()->findAll(array('order' => 'name ASC')), 'id','name'), array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('thumbnail')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'thumbnail', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('thumbnail')): ?>
				<span class="error"><?php echo $model->getError('thumbnail'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'thumbnail', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('description')): ?>
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
		<?php if($model->hasErrors('title')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'title', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('title')): ?>
				<span class="error"><?php echo $model->getError('title'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 120, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('meta_keywords')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('meta_keywords')): ?>
				<span class="error"><?php echo $model->getError('meta_keywords'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('meta_description')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'meta_description', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('meta_description')): ?>
				<span class="error"><?php echo $model->getError('meta_description'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'meta_description', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>