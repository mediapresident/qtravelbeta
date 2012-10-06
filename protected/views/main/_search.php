<div class="form search">
    <?php $form = $this->beginWidget('CActiveForm', array('action' => '/hotels', 'method' => 'get')); ?>
    <div class="box"><?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'model' => $this->searchForm,
        'name' => 'q',
        'sourceUrl' => '/ajax/hotels',
        // additional javascript options for the autocomplete plugin
        'options' => array(
            'minLength' => '2',
            'delay' => 2,
            'autoFocus' => true,
            'select' => 'js:function(a,b){location.href=b.item.url}'
        ),
        'htmlOptions' => array(
            'placeholder' => 'Quick Search...',
            'style' => 'max-width: 230px;'
        ),
    ));
    ?></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'region', CHtml::listData(Region::model()->findAll(array('select' => 'id,name', 'order' => 'name ASC')), 'id', 'name'), array('prompt' => '--- Region ---', 'onchange' => 'selectOption(this);popCountry(this.value)')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'country', ($this->searchForm->region) ? CHtml::listData(Country::model()->findAll(array('select' => 'id,name', 'condition' => 'region_id = :region', 'params' => array(':region' => $this->searchForm->region), 'order' => 'name ASC')), 'id', 'name') : array(), array('prompt' => '--- Country ---', 'class' => 'countrydd', 'onchange' => 'selectOption(this); popCity(this.value)')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box"><?php echo $form->dropDownList($this->searchForm, 'city', ($this->searchForm->country) ? CHtml::listData(City::model()->findAll(array('select' => 'id,name', 'condition' => 'country_id = :country', 'params' => array(':country' => $this->searchForm->country), 'order' => 'name ASC')), 'id', 'name') : array(), array('prompt' => '--- Location ---', 'class' => 'citydd', 'onchange' => 'selectOption(this);')); ?> <span class="dropdownbtn" onclick="$(this).siblings('select').select();"><span class="val"></span> </span></div>
    <div class="box small"><?php echo CHtml::submitButton('Search'); ?></div>
    <div class="clear"></div>
    <?php $this->endWidget(); ?>
</div>