<div class="row">
    <div class="col triple">
        <h2><?php echo $model->heading; ?></h2>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <?php
    $staffs = Staff::model()->findAll();
    foreach ($staffs as $k => $staff):
        ?>
        <div class="col">
            <h3><?php echo $staff->name .',<br/>'. $staff->title;?></h3>
            <img src="<?php echo $staff->thumbnail; ?>" class="f-image">
            <div class="bio"><?php echo $staff->description;?></div>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
        <?php
    endforeach;
    ?>
</div>