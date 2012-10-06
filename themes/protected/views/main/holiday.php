<div class="row">
    <div class="col triple z">
        <h2><?php echo $model->title;?></h2>
    </div>
    <div class="clear"></div>
    <div class="col">
        <img src="<?php echo $model->image;?>" class="f-image">
        <img src="<?php echo $model->image2;?>" class="f-image">
        <img src="<?php echo $model->image3;?>" class="f-image">
        <img src="<?php echo $model->image4;?>" class="f-image">
    </div>
    <div class="col double">
        <?php echo $model->intro_text;?>
        <?php echo $model->full_text;?>
    </div>
</div>