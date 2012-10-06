<div class="row" style="position:relative; top: -15px;">
    <div class="col triple rt border-bot z" style=" font-size: 1.2em; color: #8C7853;">
        <?php
        if ($model->city->country->region)
            echo CHtml::link($model->city->country->region->name, '/' . $model->city->country->region->id . '-' . Q::slug($model->city->country->region->name)) . ' > ';
        if ($model->city->country)
            echo CHtml::link($model->city->country->name, '/country/' . $model->city->country->id . '-' . Q::slug($model->city->country->name)) . ' > ';
        if ($model->city)
            echo CHtml::link($model->city->name, '/city/' . $model->city->id . '-' . Q::slug($model->city->name));
        ?>
    </div>
    <div class="clear"></div>
    <div class="col triple">
        <h2><?php echo $model->name; ?></h2>
        <?php echo $model->description; ?>
        <h3>QT Insider</h3>
        <?php echo nl2br($model->key_points); ?>
    </div>
    <div class="clear"></div>
    <div class="enquire col">
        
        <h3>Enquiry Form</h3>
        <?php $this->renderPartial('application.views.main._enquire'); ?>
    </div>
    <div class="clear"></div>
    <div class="col double" style="padding:10px 0px;">
        <span class='st_facebook_hcount' displayText='Facebook'></span>
        <span class='st_twitter_hcount' displayText='Tweet'></span>
        <span class='st_email_hcount' displayText='Email'></span>
        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
    </div>
    <div class="col">
        <?php echo CHtml::link('Enquire Now', '#', array('class' => 'enquire-btn', 'onclick' => "$('.enquire').slideToggle();return false;")); ?>
    </div>
    <div class="clear"></div>
    <div class="col triple z">
        <h3>More Inspirations</h3>
    </div>
    <div class="row small">
        <?php
        $hotels = Q::getRelated($model->city, $model->city->country, $model->city->country->region);
        if ($hotels) {
            foreach ($hotels as $data):
                ?>
                <div class="col">
                    <h3><?php echo CHtml::link($data->name,'/hotel/'.$data->id.'-'.Q::slug($data->name)); ?></h3>
                </div>
                <?php
            endforeach;
            echo "<div class='clear'></div>";
            foreach($hotels as $data):
                 $thumbnail = ($data->featuredImage) ? $data->featuredImage->thumbnail_url : $data->image->thumbnail_url;
                ?>
                <div class="col">
                    <?php echo CHtml::link('<img src="'.$thumbnail.'" class="f-image">','/hotel/'.$data->id.'-'.Q::slug($data->name));?>
                </div>
                <?php
            endforeach;
        }
        ?>
    </div>

</div>