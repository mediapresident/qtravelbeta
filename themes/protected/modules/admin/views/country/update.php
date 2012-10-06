<?php
$this->menu = array(
	array('label' => 'Countries', 'url' => array('index')),
	array('label' => 'Create country', 'url' => array('create')),
	array('label' => 'Update country', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete country', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this country?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update country</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>