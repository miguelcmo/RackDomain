<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	//'Rooms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Back To Location', 'url'=>array('location/view','id'=>$model->location->locationId)),
	//array('label'=>'List Room', 'url'=>array('index', 'lid'=>$model->location->locationId)),
	array('label'=>'Create Room', 'url'=>array('create', 'lid'=>$model->location->locationId)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rooms</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-grid',
	'itemsCssClass'=>'table table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'roomId',
		array(
			'name'=>'locationId',
			'value'=>'$data->location->locationName',
		),*/
		'roomName',
		'roomAlias',
		'roomDescription',
		'floorLocation',
		/*
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
