<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'continent-form',
	'enableAjaxValidation' => false,
	'focus' => array($model, 'slug'),
	'htmlOptions' => array(
		'class' => 'form',
	),
)); ?>
		
	<div class="group">
		<?php if($model->hasErrors('slug')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'slug', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('slug')): ?>
				<span class="error"><?php echo $model->getError('slug'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'slug', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('code')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'code', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('code')): ?>
				<span class="error"><?php echo $model->getError('code'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'code', array('size' => 2, 'maxlength' => 2, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('heading')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'heading', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('heading')): ?>
				<span class="error"><?php echo $model->getError('heading'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'heading', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
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
		<?php echo $form->textArea($model, 'title', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
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
		<?php echo $form->textArea($model, 'meta_keywords', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
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
		<?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('content')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'content', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('content')): ?>
				<span class="error"><?php echo $model->getError('content'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('office_id')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'office_id', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('office_id')): ?>
				<span class="error"><?php echo $model->getError('office_id'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->dropDownList($model, 'office_id', CHtml::listData(Office::model()->findAll(), 'id', 'name'), array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('state')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'state', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('state')): ?>
				<span class="error"><?php echo $model->getError('state'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->dropDownList($model, 'state', $model->getStates(), array('class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>