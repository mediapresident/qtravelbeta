<?php
$this->menu = array(
	array('label' => 'Staffs', 'url' => array('index')),
	array('label' => 'Create staff', 'url' => array('create')),
	array('label' => 'Update staff', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete staff', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this staff?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Staff's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'title',
					'description',
					'thumbnail',
					'orders',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>