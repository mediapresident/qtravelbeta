<?php
$this->menu = array(
	array('label' => 'Itineraries', 'url' => array('index')),
	array('label' => 'Create itinerary', 'url' => array('create')),
	array('label' => 'Update itinerary', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete itinerary', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this itinerary?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Update itinerary</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>