<div class="row">

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
        <h2>Press Releases</h2>
    </div>
    
        <?php
        $press = Press::model()->findAll();
        foreach ($press as $p):
            ?>
    <div class="col">
        <img src="<?php $p->thumbnail;?>" class="f-image">
    </div>
        <?php endforeach; ?>

</div>