<?php $provider = $model->search(); ?>
<div class="inner" id="country-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'country-grid',
		'summaryText' => 'Countries {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#country-grid-actions .pagination a, #country-grid .table thead th a',
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
			array('name' => 'Region', 'value' => '($data->region)?$data->region->name:""'),
			/*
			'thumbnail',
			'description',
			'title',
			'meta_keywords',
			'meta_description',
			*/
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this country?',
                'buttons' => array(
                    'cities' => array('name' => 'view Cities', 'url' => '"/admin/city?City[country_id]=".$data->id')
                ),
                'template' => '{view} {update} {delete} {cities}'
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="country-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create country
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>