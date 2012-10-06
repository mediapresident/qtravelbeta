<?php
$this->menu = array(
	array('label' => 'Presses', 'url' => array('index')),
	array('label' => 'Create press', 'url' => array('create')),
	array('label' => 'Update press', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete press', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this press?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Press's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'title',
					'sub_title',
					'thumbnail',
					'main_image',
					'orders',
					'month',
					'year',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>