<?php
$this->breadcrumbs=array(
	'Presses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Press', 'url'=>array('index')),
	array('label'=>'Create Press', 'url'=>array('create')),
	array('label'=>'Update Press', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Press', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Press', 'url'=>array('admin')),
);
?>

<h1>View Press #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'sub_title',
		'thumbnail',
		'main_image',
		'orders',
		'month',
		'year',
	),
)); ?>
