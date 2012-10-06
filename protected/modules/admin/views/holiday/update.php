<?php
$this->menu = array(
	array('label' => 'Holidays', 'url' => array('index')),
	array('label' => 'Create holiday', 'url' => array('create')),
	array('label' => 'Update holiday', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete holiday', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this holiday?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update holiday</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>