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
		<h2 class="title">Itinerary's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'title',
					'region_id',
					'intro_text',
					'full_text',
					'whats_included',
					'pdf',
					'image',
					'image2',
					'image3',
					'image4',
					'order',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>