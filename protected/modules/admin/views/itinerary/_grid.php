<?php $provider = $model->search(); ?>
<div class="inner" id="itinerary-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'itinerary-grid',
		'summaryText' => 'Itineraries {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#itinerary-grid-actions .pagination a, #itinerary-grid .table thead th a',
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
			'title',
			array('name' => 'region', 'value' => 'isset($data->region)?$data->region->name:""' ),
			/*
			'intro_text',
			'full_text',
			'whats_included',
			'pdf',
			'image',
			'image2',
			'image3',
			'image4',
			'order',
			*/
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this itinerary?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="itinerary-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create itinerary
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>