<?php
$this->menu = array(
	array('label' => 'Regions', 'url' => array('index')),
	array('label' => 'Create region', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new region</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>