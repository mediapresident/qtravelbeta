<?php
$this->menu = array(
	array('label' => 'Presses', 'url' => array('index')),
	array('label' => 'Create press', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new press</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>