<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName,
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Room'), 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	array('label'=>Yii::t('viewst','Update Row'), 'url'=>array('update', 'id'=>$model->rowId)),
	array('label'=>Yii::t('viewst','Delete Row'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rowId, 'rid'=>$model->room->roomId),'confirm'=>Yii::t('viewst','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('viewst','Create Racks'), 'url'=>array('rack/create', 'rid'=>$model->rowId)),
	array('label'=>Yii::t('viewst','Order Racks'), 'url'=>array('rack/order', 'rid'=>$model->rowId)),
);
?>
<?php /* <h4>This rack is on location <?php echo Yii::app()->user->getState('lid'); ?></h4> */ ?>
<h1><?php echo Yii::t('viewst','View Row '); ?><?php echo $model->rowName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rowName',
		'rowDescription',
	),
)); ?>

<br />
<h1><?php echo Yii::t('viewst','Row Racks'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rackDataProvider,
	'itemView'=>'/rack/_view',
	'htmlOptions'=>array('class'=>'list-view-horizontal'),
)); ?>
