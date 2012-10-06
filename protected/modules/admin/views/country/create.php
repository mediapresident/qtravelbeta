<?php
$this->menu = array(
	array('label' => 'Countries', 'url' => array('index')),
	array('label' => 'Create country', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new country</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>