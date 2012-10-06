<div class="row">
    <div class="col triple">
        <?php if($model->heading):?><h1><?php echo $model->heading; ?></h1><?php endif; ?>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <div class="col triple z">
        <h2>Testimonials</h2>
    </div>
    <?php
    $testimonials = Testimonial::model()->findAll();
    foreach ($testimonials as $testimonial):
        ?>
        <div class="col triple">
            <?php echo $testimonial->text; ?>
            <span class="bold"><?php echo $testimonial->name; ?></span>
        </div>
        <?php
    endforeach;
    ?>

    <div class="col triple z">
        <h2>Press</h2>
    </div>

    <?php
    $press = Press::model()->findAll(array('order' => 'orders ASC'));
    foreach ($press as $p):
        ?>
        <div class="col">
            <a href="<?php echo $p->main_image; ?>" rel="lightbox"><img src="<?php $p->thumbnail; ?>" class="f-image"></a>
        </div>
    <?php endforeach; ?>

</div>