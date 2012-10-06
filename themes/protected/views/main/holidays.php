<div class="row">
    <div class="col triple">
        <h2><?php echo $model->heading; ?></h2>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <?php
    $holidays = Holiday::model()->findAll();
    foreach ($holidays as $k => $h):
        $link = '/holiday/'.$h->id.'-'.Q::slug($h->title);
        ?>
    <div class="col">
        <h3><?php echo CHtml::link($h->title, $link); ?></h3>
        <?php echo CHtml::link('<img src="'.$h->image.'" class="f-image">',$link);?>
        <?php echo $h->intro_text; ?>
    </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>
</div>