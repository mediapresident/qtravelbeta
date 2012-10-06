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
		<h2 class="title">Hotel's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'holiday_group',
					'city_id',
					'description',
					'key_points',
					'created',
					'last_updated',
					'status',
					'meta_keywords',
					'meta_description',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>