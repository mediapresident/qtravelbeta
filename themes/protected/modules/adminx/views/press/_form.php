<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'press-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_title'); ?>
		<?php echo $form->textArea($model,'sub_title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'sub_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail'); ?>
		<?php echo $form->textArea($model,'thumbnail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_image'); ?>
		<?php echo $form->textArea($model,'main_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'main_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orders'); ?>
		<?php echo $form->textField($model,'orders'); ?>
		<?php echo $form->error($model,'orders'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->