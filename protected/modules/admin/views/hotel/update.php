<?php
$this->menu = array(
	array('label' => 'Hotels', 'url' => array('index')),
	array('label' => 'Create hotel', 'url' => array('create')),
	array('label' => 'Update hotel', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete hotel', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this hotel?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update hotel</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>