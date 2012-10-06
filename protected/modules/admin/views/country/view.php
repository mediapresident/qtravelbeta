<?php
$this->menu = array(
	array('label' => 'Countries', 'url' => array('index')),
	array('label' => 'Create country', 'url' => array('create')),
	array('label' => 'Update country', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete country', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this country?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Country's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'region_id',
					'thumbnail',
					'description',
					'title',
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