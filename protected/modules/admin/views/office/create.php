<?php
$this->menu = array(
	array('label' => 'Offices', 'url' => array('index')),
	array('label' => 'Create office', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new office</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>