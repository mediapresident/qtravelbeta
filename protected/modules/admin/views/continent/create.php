<?php
$this->menu = array(
	array('label' => 'Continents', 'url' => array('index')),
	array('label' => 'Create continent', 'url' => array('create')),
);
?>
<div class="block">
	<div class="content">
		<h2 class="title">Create new continent</h2>
		<div class="inner">
			<?php $this->renderPartial('_form', array(
				'model' => $model,
			)); ?>
		</div>
	</div>
</div>