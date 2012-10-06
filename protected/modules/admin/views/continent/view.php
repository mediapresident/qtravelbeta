<?php
$this->menu = array(
	array('label' => 'Continents', 'url' => array('index')),
	array('label' => 'Create continent', 'url' => array('create')),
	array('label' => 'Update continent', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete continent', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this continent?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Continent's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'slug',
					'code',
					'heading',
					'title',
					'meta_keywords',
					'meta_description',
					'content',
					'office_id',
					'state',
				),
				'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
				'htmlOptions' => array(
					'class' => 'table',
				),
			)); ?>
		</div>
	</div>
</div>