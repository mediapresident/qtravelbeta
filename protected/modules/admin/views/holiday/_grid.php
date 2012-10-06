<?php $provider = $model->search(); ?>
<div class="inner" id="holiday-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'holiday-grid',
		'summaryText' => 'Holidays {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#holiday-grid-actions .pagination a, #holiday-grid .table thead th a',
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
                        'position',
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this holiday?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="holiday-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create holiday
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>