<?php $provider = $model->search(); ?>
<div class="inner" id="office-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'office-grid',
		'summaryText' => 'Offices {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#office-grid-actions .pagination a, #office-grid .table thead th a',
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
			'address',
			'phone',
			'region',
			'position',
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this office?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="office-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create office
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>