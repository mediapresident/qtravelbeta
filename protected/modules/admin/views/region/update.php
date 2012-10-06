<?php
$this->menu = array(
	array('label' => 'Regions', 'url' => array('index')),
	array('label' => 'Create region', 'url' => array('create')),
	array('label' => 'Update region', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete region', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this region?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update region</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>