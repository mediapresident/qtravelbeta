<?php
$this->menu = array(
	array('label' => 'Continents', 'url' => array('index')),
	array('label' => 'Create continent', 'url' => array('create')),
	array('label' => 'Update continent', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete continent', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this continent?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update continent</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>