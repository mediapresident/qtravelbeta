<div class="row">
    <div class="col triple">
        <h2><?php echo $model->heading; ?></h2>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <?php
    $c = new CDbCriteria();
    $c->with = array('hotel');
    $offers = Offer::model()->findAll($c);
    foreach ($offers as $k => $o):
        $data = $o->hotel;
        $thumbnail = ($data->featuredImage) ? $data->featuredImage->thumbnail_url : $data->image->thumbnail_url;
        $link = '/hotel/' . $data->id . '-' . Q::slug($data->name);
        ?>

        <div class="col">
            <h3><?php echo CHtml::link($data->name, $link); ?></h3>
            <?php echo CHtml::link('<img src="' . $thumbnail . '" class="f-image">', $link); ?>
            <?php echo Q::trunc($data->description, $link); ?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>
</div>