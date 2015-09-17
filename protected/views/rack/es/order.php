<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->room->location->locationName=>array('location/view','id'=>$model->room->location->locationId),
	$model->room->roomName=>array('room/view','id'=>$model->room->roomId),
	$model->rowName=>array('row/view','id'=>$model->rowId),
	'Ordenar',
);

$this->menu=array(
	array('label'=>'Volver a Fila', 'url'=>array('row/view', 'id'=>$model->rowId)),
);
?>

<h1>Ordenar Racks</h1>

<p class="note">Arrastre y suelte los Racks para re-ordenar su posición, luego haga clic en el botón de enviar.</p>

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
echo CHtml::ajaxButton('Enviar Cambios', '', array(
	'type' => 'POST',
	'data' => array(
		// Turn the Javascript array into a PHP-friendly string
		'Order' => 'js:$("ul.ui-sortable").sortable("toArray").toString()',
		)
	),
	array('class'=>'btn')
);
?>