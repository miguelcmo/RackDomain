<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	Yii::t('rdt','Reports')=>array('index'),
);

$this->menu=array(
	array('label'=>Yii::t('rdt','Report 1'), 'url'=>'#'),
	array('label'=>Yii::t('rdt','Report 2'), 'url'=>'#'),
	array('label'=>Yii::t('rdt','Report 3'), 'url'=>'#'),
	array('label'=>Yii::t('rdt','Report 4'), 'url'=>'#'),
	array('label'=>Yii::t('rdt','Report 5'), 'url'=>'#'),
);
?>

<h1>Main Report View</h1>

<?php 
$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        //'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'General Ocupation Report by Location',
        ),
        'xAxis' => array(
			'categories' => $division,
			'crosshair' => true,
        ),
		'yAxis' => array(
			array(
				'title'=>array(
					'text'=>'Locations',
				),
			),
			array(
				'labels'=>array(
					'format'=>'{value} %',
				),
				'title'=>array(
					'text'=>'% Ocupation',
				),
				'max'=>100,
				'opposite'=>true,
			),
		),
		'tooltip'=>array(
			'shared'=>true,
		),
        'series' => array(
            array(
                'type' => 'column',
                'name' => 'Locations',
                'data' => $locations,
			),
            array(
				'type' => 'column',
				'yAxis' => 1,
                'name' => '% Ocupation',
                'data' => $ocupation,
				'tooltip' => array(
					'valueSuffix' => ' %',
				),
            ),
			
        ),
    )
));
?>