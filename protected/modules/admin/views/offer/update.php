<?php
$this->menu = array(
	array('label' => 'Offers', 'url' => array('index')),
	array('label' => 'Create offer', 'url' => array('create')),
	array('label' => 'Update offer', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete offer', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this offer?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update offer</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>