<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName=>array('row/view','id'=>$model->rowId),
	Yii::t('viewst','Order'),
);

$this->menu=array(
	array('label'=>Yii::t('viewst','Back To Row'), 'url'=>array('row/view', 'id'=>$model->rowId)),
	//array('label'=>'Create Rack', 'url'=>array('create')),
	//array('label'=>'Manage Rack', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('viewst','Order Racks'); ?></h1>

<p class="note"><?php echo Yii::t('viewst','Drag and drop the racks to reorder their position, then click on submit button.'); ?></p>

<?php
// Organize the dataProvider data into a Zii-friendly array
$items = CHtml::listData($dataProvider->getData(), 'rackId', 'rackName');
// Implement the JUI Sortable plugin
$this->widget('zii.widgets.jui.CJuiSortable', array(
	'id' => 'orderList',
	'items' => $items,
	//'htmlOptions' => array('class'=>'ui-state-default'),
));
// Add a Submit button to send data to the controller
echo CHtml::ajaxButton(Yii::t('viewst','Submit Changes'), '', array(
	'type' => 'POST',
	'data' => array(
		// Turn the Javascript array into a PHP-friendly string
		'Order' => 'js:$("ul.ui-sortable").sortable("toArray").toString()',
		),
		'params' => array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
	),
	
	array('class'=>'btn')
);
?>