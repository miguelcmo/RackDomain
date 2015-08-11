<?php
/* @var $this RackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	$model->row->rowName=>array('row/view','id'=>$model->row->rowId),
	'Order',
);

$this->menu=array(
	array('label'=>'Back To Row', 'url'=>array('row/view', 'id'=>$model->row->rowId)),
	array('label'=>'Create Rack', 'url'=>array('create')),
	array('label'=>'Manage Rack', 'url'=>array('admin')),
);
?>

<h1>Racks</h1>

<p class="note">Drag and drop the racks to reorder their position, then click on submit button.</p>

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
echo CHtml::ajaxButton('Submit Changes', '', array(
	'type' => 'POST',
	'data' => array(
		// Turn the Javascript array into a PHP-friendly string
		'Order' => 'js:$("ul.ui-sortable").sortable("toArray").toString()',
		)
	),
	array('class'=>'btn')
);
?>