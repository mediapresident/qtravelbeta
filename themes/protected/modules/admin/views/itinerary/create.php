<?php
$this->menu = array(
	array('label' => 'Itineraries', 'url' => array('index')),
	array('label' => 'Create itinerary', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new itinerary</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>