<?php
$this->menu = array(
	array('label' => 'Staffs', 'url' => array('index')),
	array('label' => 'Create staff', 'url' => array('create')),
	array('label' => 'Update staff', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete staff', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this staff?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update staff</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>