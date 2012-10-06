<div class="row">
    <div class="col triple">
        <?php if ($model->heading): ?><h1><?php echo $model->heading; ?></h1><?php endif; ?>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <?php
    if (!$offers) {

        $c = new CDbCriteria();
        $c->with = array('hotel');
        $c->order = 'position ASC';
        $offers = Offer::model()->findAll($c);
    }
    foreach ($offers as $k => $o):
        $data = $o->hotel;
        $thumbnail = ($data->featuredImage) ? $data->featuredImage->thumbnail_url : $data->image->thumbnail_url;
        $link = '/hotel/' . $data->id . '-' . Q::slug($data->name);
        ?>

        <div class="col">
            <h3><?php echo CHtml::link($data->name, $link); ?></h3>
            <?php echo CHtml::link('<img src="' . $thumbnail . '" class="f-image">', $link); ?>
            <?php echo Q::trunc($o->offer, $link, 1000); ?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>

    <?php endforeach; ?>
    <div class="clear"></div>
    <div class="col triple z">
        <iframe src="/main/ad" width="958" height="255" frameborder="0" border="0" style="margin: 0px auto; border: 0;"></iframe>
    </div>
</div>