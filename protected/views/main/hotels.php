<div class="row">
    <?php if($model):?>
    <div class="col triple hotels">
        <h1><?php echo isset($model->heading)&&$model->heading?$model->heading: "Luxury hotels in ". $model->name;?></h1>
        <?php echo (isset($model->description))?$model->description:'';?>
    </div>
    <?php endif?>
    <div class="clear"></div>
    <?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$data,
    'itemView'=>'_hotel',
    'emptyText' => 'Sorry, No matching hotels found.',
    'summaryText' => 'Displaying {start} - {end} of {count} Hotels',
    'template' => '<div class="col triple">{summary}{pager}</div><div class="clear"></div>{items}',
    'afterAjaxUpdate' => 'function(id, data){clearFixHotels();}'
));
?></div>
<script>clearFixHotels();</script>