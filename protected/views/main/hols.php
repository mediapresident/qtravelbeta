<?php
$this->breadCrumb = array('Luxury Holidays' => array('/holiday'), isset($model->heading)?$model->heading:'');
?><div class="row">
    <?php if ($model): ?>
        <div class="col triple hotels">
            <h1><?php echo $model->heading; ?></h1>
            <?php echo (isset($model->description)) ? $model->description : ''; ?>
        </div>
    <?php endif ?>
    <div class="clear"></div>
    <div class=" items">
        <?php
        foreach ($model->map as $m) {
            $hotel = $m->hotel;
            if ($hotel) {
                if ($m->description) {
                    $hotel->description = $m->description;
                }
                echo $this->renderPartial('_hotel', array('data' => $hotel, 'length' => 5000));
            }
        }
        ?></div>
</div>
<script>clearFixHotels();</script>