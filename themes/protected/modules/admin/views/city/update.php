<?php
$this->menu = array(
	array('label' => 'Cities', 'url' => array('index')),
	array('label' => 'Create city', 'url' => array('create')),
	array('label' => 'Update city', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete city', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this city?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update city</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>