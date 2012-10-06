
<div class="row">
    <div class="col triple">
        <h1><?php echo isset($region->heading)?$region->heading:$region->name; ?></h1>
        <?php echo $region->description; ?>
    </div>
    <div class="clear"></div>
    <?php foreach ($model as $k => $m): ?>
    <?php $link = '/country/' . $m->id . '-' . Q::slug($m->name); ?>
        <div class="col">
            <h3><?php echo CHtml::link($m->name, '/country/' . $m->id . '-' . Q::slug($m->name)); ?></h3>
            <?php echo CHtml::link('<img src="' . $m->thumbnail . '" class="f-image">', '/country/' . $m->id . '-' . Q::slug($m->name)); ?>

            
            <?php echo Q::trunc($m->description, $link);?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>

    <div class="clear"></div>
    <?php if (count($itineraries)): ?>
    <div class="col triple z"><h3 style="font-size: 19px;">Suggested Itineraries</h3></div>
        <?php foreach ($itineraries as $i): ?>
            <div class="col">
                <?php $link = '/be-inspired/'.$i->id.'-'.Q::slug($i->title);?>
                <h3><?php echo CHtml::link($i->title, $link)?></h3>
                <?php echo CHtml::link('<img src="' . $i->image . '" class="f-image">',$link); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>