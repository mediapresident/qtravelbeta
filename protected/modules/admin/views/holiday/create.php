<?php
$this->menu = array(
	array('label' => 'Holidays', 'url' => array('index')),
	array('label' => 'Create holiday', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new holiday</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>