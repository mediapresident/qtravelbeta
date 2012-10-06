<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'press-form',
	'enableAjaxValidation' => false,
	'focus' => array($model, 'title'),
	'htmlOptions' => array(
		'class' => 'form',
	),
)); ?>
		
	<div class="group">
		<?php if($model->hasErrors('title')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'title', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('title')): ?>
				<span class="error"><?php echo $model->getError('title'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'title', array( 'class' => 'text_field')); ?>
	</div>
<!--		
	<div class="group">
		<?php if($model->hasErrors('sub_title')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'sub_title', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('sub_title')): ?>
				<span class="error"><?php echo $model->getError('sub_title'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'sub_title', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
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
		<?php echo $form->textArea($model, 'thumbnail', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('main_image')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'main_image', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('main_image')): ?>
				<span class="error"><?php echo $model->getError('main_image'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'main_image', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		-->
	<div class="group">
		<?php if($model->hasErrors('orders')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'orders', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('orders')): ?>
				<span class="error"><?php echo $model->getError('orders'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'orders', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('month')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'month', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('month')): ?>
				<span class="error"><?php echo $model->getError('month'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'month', array('class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('year')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'year', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('year')): ?>
				<span class="error"><?php echo $model->getError('year'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'year', array('class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>