<?php
$this->breadCrumb = array('Luxury Holidays');
?>
<div class="row">
    
    <div class="col triple">
        <?php if($model->heading):?><h1><?php echo $model->heading; ?></h1><?php endif; ?>
        <?php echo $model->content; ?>
    </div>
    <div class="clear"></div>
    <?php
    $holidays = Holiday::model()->findAll(array('order' => 'position ASC'));
    
    foreach ($holidays as $k => $h):
        $target = "_parent";
        if($h->url){
            $link = $h->url;
            $target = "_blank";
        }
        else $link = '/holiday/'.$h->id.'-'.Q::slug($h->name);
        
        ?>
    <div class="col">
        <h3><?php echo CHtml::link($h->name, $link); ?></h3>
        <?php echo CHtml::link('<img src="'.$h->image.'" class="f-image">',$link, array('target' => $target));?>
            <?php echo Q::trunc($h->description, $link, 1000, array('target' => $target) ); ?>
    </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?> 
</div>