
<?php
$thumbnail = ($data && $data->featuredImage) ? $data->featuredImage->thumbnail_url : ($data->image)?$data->image->thumbnail_url:'';
$link = '/hotel/' . $data->id . '-' . Q::slug($data->name);
?>
<div class="col">
    <h3><?php echo CHtml::link($data->name,$link); ?></h3>
    <?php echo CHtml::link('<img src="'.$thumbnail.'" class="f-image">',$link);?>
    <?php echo Q::trunc($data->description, $link, isset($length)?$length:100); ?>
</div>