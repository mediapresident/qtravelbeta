<?php
$this->menu = array(
	array('label' => 'Testimonials', 'url' => array('index')),
	array('label' => 'Create testimonial', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new testimonial</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>