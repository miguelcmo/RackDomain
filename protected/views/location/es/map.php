<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locaciones'=>array('index'),
	$model->locationName=>array('location/view', 'id'=>$model->locationId),
	'Mapa de Locación',
);

$this->menu=array(
	array('label'=>'Volver a Locación', 'url'=>array('location/view','id'=>$model->locationId)),
);
?>

<?php
//
// ext is your protected.extensions folder
// gmaps means the subfolder name under your protected.extensions folder
//  
Yii::import('application.extensions.egmap.*');
 
$gMap = new EGMap();
$gMap->zoom = 16;

$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);

 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;
 
$gMap->setCenter($model->locationLatitude, $model->locationLongitude);
 
// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow('<div>Take a snap with the street view icon at '.$model->locationName.'</div>');
$info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');
 
$icon = new EGMapMarkerImage('images/racks/sds_pointer_icon.png');
 
$icon->setSize(30, 30);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);
 
// Create marker
$marker = new EGMapMarker($model->locationLatitude, $model->locationLongitude, array('title' => $model->locationName,'icon'=>$icon));
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);
 
// Create marker with label
$marker = new EGMapMarkerWithLabel($model->locationLatitude, $model->locationLongitude, array('title' => 'Marker With Label'));
 
$label_options = array(
  'backgroundColor'=>'yellow',
  'opacity'=>'0.75',
  'width'=>'100px',
  'color'=>'blue'
);
 
/*
// Two ways of setting options
// ONE WAY:
$marker_options = array(
  'labelContent'=>'$9393K',
  'labelStyle'=>$label_options,
  'draggable'=>true,
  // check the style ID 
  // afterwards!!!
  'labelClass'=>'labels',
  'labelAnchor'=>new EGMapPoint(22,2),
  'raiseOnDrag'=>true
);
 
$marker->setOptions($marker_options);
*/
/*
// SECOND WAY:
$marker->labelContent= '$425K';
$marker->labelStyle=$label_options;
$marker->draggable=true;
$marker->labelClass='labels';
$marker->raiseOnDrag= true;
 
$marker->setLabelAnchor(new EGMapPoint(22,0));
 
$marker->addHtmlInfoWindow($info_window_b);
 
$gMap->addMarker($marker);
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());

*/ 
$gMap->renderMap();


?>


<?php /*
<style type="text/css">
.labels {
   color: red;
   background-color: white;
   font-family: "Lucida Grande", "Arial", sans-serif;
   font-size: 10px;
   font-weight: bold;
   text-align: center;
   width: 40px;     
   border: 2px solid black;
   white-space: nowrap;
}
</style>
*/ ?>