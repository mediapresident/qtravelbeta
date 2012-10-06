<?php
$this->menu = array(
	array('label' => 'Holidays', 'url' => array('index')),
	array('label' => 'Create holiday', 'url' => array('create')),
	array('label' => 'Update holiday', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete holiday', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this holiday?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Holiday's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'title',
					'description',
					'image',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>