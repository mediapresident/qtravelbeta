<?php
$this->menu = array(
	array('label' => 'Offers', 'url' => array('index')),
	array('label' => 'Create offer', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new offer</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>