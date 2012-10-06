<?php
$this->menu = array(
	array('label' => 'Presses', 'url' => array('index')),
	array('label' => 'Create press', 'url' => array('create')),
	array('label' => 'Update press', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete press', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this press?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update press</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>