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
		<h2 class="title">Offer's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'hotel_id',
					'offer',
					'expiry',
					'position',
					'live',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>