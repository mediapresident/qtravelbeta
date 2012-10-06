<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'page-form',
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
		<?php if($model->hasErrors('url')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'url', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('url')): ?>
				<span class="error"><?php echo $model->getError('url'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
	</div>
		
	<div class="group">
		<?php if($model->hasErrors('keywords')): ?>
			<div class="fieldWithErrors">
		<?php endif; ?>
		<?php echo $form->labelEx($model, 'keywords', array('class' => 'label')); ?>
		<?php if ($model->hasErrors('keywords')): ?>
				<span class="error"><?php echo $model->getError('keywords'); ?></span>
			</div>
		<?php endif; ?>
		<?php echo $form->textField($model, 'keywords', array('size' => 60, 'maxlength' => 255, 'class' => 'text_field')); ?>
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
		
	
	<div class="group navform wat-cf">
		<button class="button" type="submit">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/save.png', $model->isNewRecord ? 'Create' : 'Save'); ?> <?php echo $model->isNewRecord ? 'Create' : 'Save'; ?>
		</button>
		<span class="text_button_padding">or</span>
		<?php echo CHtml::link('Cancel', array('index'), array('class' => 'text_button_padding link_button')); ?>
	</div>
<?php $this->endWidget(); ?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    var opt = { fullPanel : false}
    var ne = new nicEditor(opt);
    ne.addInstance('Page_content');
})
</script>
