<?php
$this->breadcrumbs=array(
	'Destination'=>array('/admin/destination'),
	'Regions',
);?>
<h1>Regions</h1>

<?php
$dataProvider=new CActiveDataProvider('Region');

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns' => array(
        'id',
        'name',
        array(
            'class' =>'CButtonColumn',
            'buttons' => array(
                'editbtn' => array(
                    'label' => 'Edit',
                    'url' => '"/admin/destination/region/id/".$data->id'
                ),
                'deletebtn' => array(
                    'label' => 'Delete',
                    'url' => '"/admin/destination/region/id/".$data->id."?delete"'
                ),
            ),
            'template' => '{editbtn} {deletebtn}'
        )
    )
));
?>