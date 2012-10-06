<?php $provider = $model->search(); ?>
<div class="inner" id="region-grid-inner">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'region-grid',
        'summaryText' => 'Regions {start} - {end} of {count}',
        'emptyText' => 'There are no data to display',
        'updateSelector' => '#region-grid-actions .pagination a, #region-grid .table thead th a',
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
            /*
              'description',
              'thumbnail',
              'show_hp',
              'meta_keywords',
              'meta_description',
              'title',
             */
            array(
                'class' => 'EButtonColumn',
                'deleteConfirmation' => 'Do you really want to delete this region?',
                'buttons' => array(
                    'countries' => array('name' => 'view Countries', 'url' => '"/admin/country?Country[region_id]=".$data->id')
                ),
                'template' => '{view} {update} {delete} {countries}'
            ),
        ),
    ));
    ?>
    <div class="actions-bar wat-cf" id="region-grid-actions">
        <div class="actions">
            <button class="button action-create" type="button">
<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create region
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