<?php
$this->menu = array(
	array('label' => 'Testimonials', 'url' => array('index')),
	array('label' => 'Create testimonial', 'url' => array('create')),
	array('label' => 'Update testimonial', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete testimonial', 'url' => '#', 'linkOptions' => array(
		'submit' => array('delete', 'id' => $model->id),
		'confirm' => 'Do you really want to delete this testimonial?',
	)),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Testimonial's details</h2>
		<div class="inner">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data' => $model,
				'attributes' => array(
					'id',
					'name',
					'text',
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