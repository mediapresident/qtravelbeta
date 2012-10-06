<?php
$this->menu = array(
	array('label' => 'Cities', 'url' => array('index')),
	array('label' => 'Create city', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new city</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>