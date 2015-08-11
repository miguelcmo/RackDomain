<?php
/* @var $this ObjectController */
/* @var $model Object */

$this->breadcrumbs=array(
	'Objects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Object', 'url'=>array('index')),
	array('label'=>'Manage Object', 'url'=>array('admin')),
);
?>

<h1>Create Object</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'rackSpace'=>$rackSpace)); ?>

<div id="rackDetail">
<img id="rack" src="images/racks/rackModel.png" height="598px" width="240px"/> 
<?php foreach($rackSpaceView as $value): ?>
	<embed class="ru<?php echo $value['initialRU']?>" src="<?php echo $value['platformImagePath']; ?>"/>
<?php endforeach; ?>
</div>


<?php /**
<div>
<?php 
	//print_r($usedSpace);

	foreach ($usedSpace as $value):
		
			echo $value['initialRU'].' '.$value['endRU'];
			echo '<br>';
		
	endforeach;
	
	foreach ($usedSpace as $value){
			for($i=$initial;$i<$end;$i++){
				if($i>=$value['initialRU'] && $i<=$value['endRU']){
					echo 'esta siendo usada';
				}
			}
		}

 ?>
 <br>
 <?php 
	//print_r($rackSpaceView);

	foreach ($rackSpaceView as $value):
		echo $value['initialRU'];
	endforeach;

 ?>
 
</div>
*/ ?>
