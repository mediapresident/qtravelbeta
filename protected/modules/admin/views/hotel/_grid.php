<?php $provider = $model->search(); ?>
<div class="inner" id="hotel-grid-inner">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'hotel-grid',
        'summaryText' => 'Hotels {start} - {end} of {count}',
        'emptyText' => 'There are no data to display',
        'updateSelector' => '#hotel-grid-actions .pagination a, #hotel-grid .table thead th a',
        'afterAjaxUpdate' => "js:function(id, data){var id = '#' + id + '-actions'; \$(id).replaceWith(\$(id, '<div>' + data + '</div>'))}",
        'selectableRows' => 0,
        'showTableOnEmpty' => false,
        'filter' => $model,
        'dataProvider' => $provider,
        'cssFile' => false,
        'itemsCssClass' => 'table',
        'pagerCssClass' => 'pagination',
        'filterPosition' => 'body',
        'template' => '{items}',
        'columns' => array(
            'id',
            'name',
            array('name' => 'city.country_id', 'value' => 'isset($data->city->country)?$data->city->country->name:""'),
            array('name' => 'city.name', 'value' => 'isset($data->city)?$data->city->name:""'),
            'status',
            /*
              'created',
              'last_updated',
              'meta_keywords',
              'meta_description',
             */
            array(
                'class' => 'EButtonColumn',
                'deleteConfirmation' => 'Do you really want to delete this hotel?',
            ),
        ),
    ));
    ?>
    <div class="actions-bar wat-cf" id="hotel-grid-actions">
        <div class="actions">
            <button class="button action-create" type="button">
                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create hotel
            </button>
        </div>
        <?php
        $this->widget('application.components.widgets.ELinkPager', array(
            'cssFile' => false,
            'pages' => $provider->getPagination(),
        ));
        ?>
    </div>
</div>