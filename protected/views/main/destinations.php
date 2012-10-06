
<div class="row">
    <h1>Destinations</h1>
    <?php foreach ($model as $k => $m): ?>
        <?php $link = '/'.$m->id.'-'.Q::slug($m->name);?>
        <div class="col">
            <h3><?php echo CHtml::link($m->name, $link); ?></h3>
            <?php echo CHtml::link('<img src="'.$m->thumbnail.'" class="f-image">',  $link); ?>
            
            <?php echo Q::trunc($m->description, $link);?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>
</div>