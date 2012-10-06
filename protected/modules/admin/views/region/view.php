<?php
$this->menu = array(
	array('label' => 'Regions', 'url' => array('index')),
	array('label' => 'Create region', 'url' => array('create')),
	array('label' => 'Update region', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete region', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this region?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Region's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'description',
					'thumbnail',
					'show_hp',
					'meta_keywords',
					'meta_description',
					'title',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>