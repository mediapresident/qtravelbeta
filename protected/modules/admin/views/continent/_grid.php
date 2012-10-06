<?php $provider = $model->search(); ?>
<div class="inner" id="continent-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'continent-grid',
		'summaryText' => 'Continents {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#continent-grid-actions .pagination a, #continent-grid .table thead th a',
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
			'slug',
			'code',
			'heading',
			'title',
			'meta_keywords',
			/*
			'meta_description',
			'content',
			'office_id',
			'state',
			*/
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this continent?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="continent-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create continent
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>