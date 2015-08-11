<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Location',
);

$this->menu=array(
	array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>Locations</h1>

<?php 
	//print_r(Yii::app()->getModule('user'));
	//$location = $this->loadModel(127);
	//print_r(Yii::app()->getModule('user')->user()->id);
	//print_r(Yii::app()->getModule('user')->checkAccess('addUserToLocation', array('location'=>$location)));
	//var_dump(Yii::app()->getModule('user')->isAdmin());
	//var_dump(Yii::app()->getModule('user')->getAdmins());
	//var_dump($dataProvider);
	
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewown',
));  
?>
