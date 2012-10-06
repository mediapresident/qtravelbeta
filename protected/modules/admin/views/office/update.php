<?php
$this->menu = array(
	array('label' => 'Offices', 'url' => array('index')),
	array('label' => 'Create office', 'url' => array('create')),
	array('label' => 'Update office', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete office', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this office?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update office</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>