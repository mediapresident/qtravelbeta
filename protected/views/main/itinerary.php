<div class="row">
    <div class="col triple z">
        <?php if($model->title):?><h1><?php echo $model->title; ?></h1><?php endif; ?>
    </div>
    <div class="clear"></div>
    <div class="col">
        <img src="<?php echo $model->image;?>" class="f-image"><br/>
        <img src="<?php echo $model->image2;?>" class="f-image"><br/>
        <img src="<?php echo $model->image3;?>" class="f-image"><br/>
        <img src="<?php echo $model->image4;?>" class="f-image"><br/>
    </div>
    <div class="col double">
        <?php echo $model->intro_text;?>
        <?php echo $model->full_text;?>
    </div>
    <div class="enquire col">

        <h3>Enquiry Form</h3>
        <?php $this->renderPartial('application.views.main._enquire', array('model' => $model, 'url' => Yii::app()->createAbsoluteUrl('/be-inspired/'.$model->id.'-'.Q::slug($model->title) )  )); ?>
    </div>
    <div class="clear"></div>
    <div class="col double"></div>
    <div class="col">
        <?php echo CHtml::link('Enquire Now', '#', array('class' => 'enquire-btn', 'onclick' => "$('.enquire').slideToggle();return false;")); ?>
    </div>
</div>