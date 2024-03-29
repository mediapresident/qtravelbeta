<?php $provider = $model->search(); ?>
<div class="inner" id="press-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'press-grid',
		'summaryText' => 'Presses {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#press-grid-actions .pagination a, #press-grid .table thead th a',
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
			/*
			'sub_title',
			'thumbnail',
			'main_image',
			'orders',
			'month',
			'year',
			*/
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this press?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="press-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create press
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>