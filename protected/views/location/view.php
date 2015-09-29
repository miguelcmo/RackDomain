<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	Yii::t('viewst','Locations')=>array('index'),
	$model->locationName,
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Locations'), 'url'=>array('index')),
	array('label'=>Yii::t('viewst','Update Location'), 'url'=>array('update', 'id'=>$model->locationId)),
	array('label'=>Yii::t('viewst','Delete Location'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->locationId),'confirm'=>Yii::t('viewst','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('viewst','Create Room'), 'url'=>array('room/create', 'lid'=>$model->locationId)),
	array('label'=>Yii::t('viewst','Add User to Location'), 'url'=>array('adduser', 'lid'=>$model->locationId)),
);
?>

<h1><?php echo Yii::t('viewst','View Location '); ?><?php echo $model->locationName; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'locationId',
		array(
			'name'=>'cityId',
			'value'=>isset($model->city)?CHtml::encode($model->city->cityName):Yii::t('viewst','unknown')
		),
		array(
			'name'=>'subdivisionId',
			'value'=>isset($model->subdivision)?CHtml::encode($model->subdivision->subdivisionName):Yii::t('viewst','unknown')
		),
		'locationName',
		'locationAddress',
		'locationNeighborhood',
		/*
		'locationType',
		'locationStatus',
		'locationManager',
		'locationOperator',
		'locationLongitude',
		'locationLatitude',
		'createTime',
		'createUserId',
		'updateTime',
		'updateUserId',
		'Status',
		'Flag',
		*/
	),
)); ?>
<?php echo CHtml::link(Yii::t('viewst','Show location on Google Maps'), array('location/map', 'id'=>$model->locationId)); ?>
<br />
<h1><?php echo Yii::t('viewst','Location Rooms'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$roomDataProvider,
	'itemView'=>'/room/_view',
)); ?>
