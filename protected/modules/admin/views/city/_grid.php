<?php $provider = $model->search(); ?>
<div class="inner" id="city-grid-inner">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'city-grid',
        'summaryText' => 'Cities {start} - {end} of {count}',
        'emptyText' => 'There are no data to display',
        'updateSelector' => '#city-grid-actions .pagination a, #city-grid .table thead th a',
        'afterAjaxUpdate' => "js:function(id, data){var id = '#' + id + '-actions'; \$(id).replaceWith(\$(id, '<div>' + data + '</div>'))}",
        'selectableRows' => 0,
        'showTableOnEmpty' => false,
        'dataProvider' => $provider,
        'cssFile' => false,
        'itemsCssClass' => 'table',
        'pagerCssClass' => 'pagination',
        'template' => '{items}',
        'columns' => array(
            'id',
            'name',
            array('name' => 'country', 'value' => '($data->country)?$data->country->name:""'),
            array(
                'class' => 'EButtonColumn',
                'deleteConfirmation' => 'Do you really want to delete this city?',
                'buttons' => array(
                    'hotels' => array('name' => 'view hotels', 'url' => '"/admin/hotel?Hotel[city_id]=".$data->id')
                ),
                'template' => '{view} {update} {delete} {hotels}'
            ),
        ),
    ));
    ?>
    <div class="actions-bar wat-cf" id="city-grid-actions">
        <div class="actions">
            <button class="button action-create" type="button">
        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create city
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