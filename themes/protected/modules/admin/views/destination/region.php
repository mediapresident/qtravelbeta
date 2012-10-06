<?php
$this->breadcrumbs=array(
	'Destination'=>array('/admin/destination'),
	'Region',
);?>
<h1><?php if($region->name)echo $region->name; else echo "Add Region"; ?></h1>
<div class="form"><?php echo $form;?></div>