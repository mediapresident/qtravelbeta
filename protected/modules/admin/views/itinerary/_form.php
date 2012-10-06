<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'itinerary-form',
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
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
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
		<?php echo $form->dropDownList($model, 'region_id', CHtml::listData(Region::model()->findAll(array('order' => 'name ASC')), 'id', 'name' ) ); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('intro_text')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'intro_text', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('intro_text')): ?>
				<span class="error"><?php echo $model->getError('intro_text'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'intro_text', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('full_text')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'full_text', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('full_text')): ?>
				<span class="error"><?php echo $model->getError('full_text'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'full_text', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
<!--		
	<div class="group">
		<?php if($model->hasErrors('whats_included')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'whats_included', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('whats_included')): ?>
				<span class="error"><?php echo $model->getError('whats_included'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'whats_included', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('pdf')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'pdf', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('pdf')): ?>
				<span class="error"><?php echo $model->getError('pdf'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textArea($model, 'pdf', array('rows' => 6, 'cols' => 50, 'class' => 'text_area')); ?>
	</div>
		-->
	<div class="group">
		<?php if($model->hasErrors('image')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'image', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('image')): ?>
				<span class="error"><?php echo $model->getError('image'); ?></span>
			</div>
		<?php endif; ?>
             <?php echo Q::getImagePlaceHolder($model->image,  $form->hiddenField($model, 'image') , 'itinerary'); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('image2')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'image2', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('image2')): ?>
				<span class="error"><?php echo $model->getError('image2'); ?></span>
			</div>
		<?php endif; ?>
             <?php echo Q::getImagePlaceHolder($model->image2,  $form->hiddenField($model, 'image2') , 'itinerary'); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('image3')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'image3', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('image3')): ?>
				<span class="error"><?php echo $model->getError('image3'); ?></span>
			</div>
		<?php endif; ?>
             <?php echo Q::getImagePlaceHolder($model->image3,  $form->hiddenField($model, 'image3') , 'itinerary'); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('image4')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'image4', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('image4')): ?>
				<span class="error"><?php echo $model->getError('image4'); ?></span>
			</div>
		<?php endif; ?>
             <?php echo Q::getImagePlaceHolder($model->image4,  $form->hiddenField($model, 'image4') , 'itinerary'); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('order')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'order', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('order')): ?>
				<span class="error"><?php echo $model->getError('order'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'order', array('class' => 'text_field')); ?>
	</div>
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>
