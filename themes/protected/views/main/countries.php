
<div class="row">
    <div class="col triple">
        <h2><?php echo $region->name; ?></h2>
        <?php echo $region->description; ?>
    </div>
    <div class="clear"></div>
    <?php foreach ($model as $k => $m): ?>
        <div class="col">
            <h3><?php echo CHtml::link($m->name, '/country/'.$m->id.'-'.Q::slug($m->name)); ?></h3>
            <?php echo CHtml::link('<img src="'.$m->thumbnail.'" class="f-image">', '/country/'.$m->id.'-'.Q::slug($m->name)); ?>
            
            <?php echo $m->description;?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>
</div>