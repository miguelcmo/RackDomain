<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	$model->location->locationName=>array('location/view','id'=>$model->location->locationId),
	Yii::t('viewst','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Location'), 'url'=>array('location/view','id'=>$model->location->locationId)),
	array('label'=>Yii::t('viewst','Create Room'), 'url'=>array('create', 'lid'=>$model->location->locationId)),
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

<h1><?php echo Yii::t('viewst','Manage Rooms'); ?></h1>

<p><?php echo
Yii::t('viewst','You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php echo CHtml::link(Yii::t('viewst','Advanced Search'),'#',array('class'=>'search-button')); ?>
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
