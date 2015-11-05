<?php
/* @var $this LocationController */
/* @var $model Location */
/*
$this->breadcrumbs=array(
	Yii::t('rdt','Locations')=>array('index'),
	$model->locationName,
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Locations'), 'url'=>array('index')),
	array('label'=>Yii::t('rdt','Update Location'), 'url'=>array('update', 'id'=>$model->locationId)),
	array('label'=>Yii::t('rdt','Delete Location'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->locationId),'confirm'=>Yii::t('rdt','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('rdt','Create Room'), 'url'=>array('room/create', 'lid'=>$model->locationId)),
	array('label'=>Yii::t('rdt','Add User to Location'), 'url'=>array('adduser', 'lid'=>$model->locationId)),
);*/
?>


<h1>tbl_report Result</h1>

<p>The table show the results of the update queries for the tbl_report.</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'itemsCssClass'=>'table table-striped',
    'dataProvider'=>$dataProvider,
));
?>