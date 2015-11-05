<?php
/* @var $this RowController */
/* @var $model Row */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName,
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Back To Room'), 'url'=>array('room/view', 'id'=>$model->room->roomId)),
	array('label'=>Yii::t('rdt','Update Row'), 'url'=>array('update', 'id'=>$model->rowId)),
	array('label'=>Yii::t('rdt','Delete Row'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rowId, 'rid'=>$model->room->roomId),'confirm'=>Yii::t('rdt','Are you sure you want to delete this item?'),'params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('rdt','Create Racks'), 'url'=>array('rack/create', 'rid'=>$model->rowId)),
	array('label'=>Yii::t('rdt','Order Racks'), 'url'=>array('rack/order', 'rid'=>$model->rowId)),
);
?>

<h1><?php echo Yii::t('rdt','View Row '); ?><?php echo $model->rowName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rowName',
		'rowDescription',
	),
)); ?>

<br />

<?php /*
<h1><?php echo Yii::t('rdt','Row Racks'); ?></h1>

<?php  
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$rackDataProvider,
	'itemView'=>'/rack/_view',
	'htmlOptions'=>array('class'=>'list-view-horizontal'),
));  */
?>

<h1><?php echo Yii::t('rdt','Row Racks'); ?></h1>
<div class="list-view-horizontal">
<div class="summary">
<?php echo Yii::t('rdt','Total ').$rackDataProvider->getTotalItemCount().Yii::t('rdt',' results.'); ?>
</div>

<div class="items">
<?php foreach($rackList as $value){ ?>
	<div class="view">
	<b><?php echo Yii::t('rdt','Name: '); ?></b>
	<?php echo CHtml::link($value['rackName'], array('rack/view', 'id'=>$value['rackId'])); ?>
	</br>
	<div class="rackThumb">
		<?php 
			echo CHtml::image($value['thumbnailPath'],Yii::t('rdt','Rack miniature'));
			eval ($this->getDevicesOnRack($value['rackId']));
			
			//echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png",array( "class"=>"ru", "style"=>"left:58px;top:77px"));
			//echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:105px"));
			//echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:125px"));
			//echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:145px"));
			//echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:165px"));
			//echo CHtml::image("images/devices/thumbnails/arris-c4cmts.png", array( "class"=>"ru", "style"=>"left:58px;top:185px"));
			
		?>
	</div>
	</div>
<?php } ?>
</div>
</div>














