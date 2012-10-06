<?php
$this->menu = array(
	array('label' => 'Offices', 'url' => array('index')),
	array('label' => 'Create office', 'url' => array('create')),
	array('label' => 'Update office', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete office', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this office?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Office's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'address',
					'phone',
					'region',
					'position',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>