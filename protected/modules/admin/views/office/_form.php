<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'office-form',
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
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('address')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'address', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('address')): ?>
				<span class="error"><?php echo $model->getError('address'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('phone')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'phone', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('phone')): ?>
				<span class="error"><?php echo $model->getError('phone'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'phone', array('size' => 20, 'maxlength' => 20, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('region')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'region', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('region')): ?>
				<span class="error"><?php echo $model->getError('region'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'region', array('size' => 2, 'maxlength' => 2, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('position')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'position', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('position')): ?>
				<span class="error"><?php echo $model->getError('position'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'position', array('class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>