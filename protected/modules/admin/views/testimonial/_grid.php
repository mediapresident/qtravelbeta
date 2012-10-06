<?php $provider = $model->search(); ?>
<div class="inner" id="testimonial-grid-inner">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'testimonial-grid',
		'summaryText' => 'Testimonials {start} - {end} of {count}',
		'emptyText' => 'There are no data to display',
		'updateSelector' => '#testimonial-grid-actions .pagination a, #testimonial-grid .table thead th a',
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
			'text',
			'orders',
			array(
				'class' => 'EButtonColumn',
				'deleteConfirmation' => 'Do you really want to delete this testimonial?',
			),
		),
	)); ?>
	<div class="actions-bar wat-cf" id="testimonial-grid-actions">
		<div class="actions">
			<button class="button action-create" type="button">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/create.png', 'Create'); ?> Create testimonial
			</button>
		</div>
		<?php $this->widget('application.components.widgets.ELinkPager', array(
			'cssFile' => false,
			'pages' => $provider->getPagination(),
		)); ?>
	</div>
</div>