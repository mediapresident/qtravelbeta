<div class="form search">
    <?php $form = $this->beginWidget('CActiveForm', array('action' =>'/hotels', 'method' => 'get') );?>
    <div class="box"><?php echo $form->textField($this->searchForm, 'q', array('placeholder' => 'Quick Search...')); ?></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'region', array(0 => 'Africa', 1 => 'India'), array('prompt' => '--- Region ---', 'onchange' => 'selectOption(this);')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'country', array(0 => 'Africa', 1 => 'India'), array('prompt' => '--- Country ---', 'onchange' => 'selectOption(this);')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'city', array(0 => 'Africa', 1 => 'India'), array('prompt' => '--- Location ---', 'onchange' => 'selectOption(this);')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box small"><?php echo CHtml::submitButton('Search'); ?></div>
    <div class="clear"></div>
    <?php $this->endWidget();?>
</div>