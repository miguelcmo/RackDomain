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

Yii::app()->clientScript->registerScript('hidetspan', "
$('tspan').each(function(){
    if($(this).text()=='chart by amcharts.com'){
        $(this).text('');
    }
});
");
?>


<h1>Graph View</h1>

<?php
/* 
$this->widget('ext.amcharts.EAmChartWidget', 
					array(
						'width' => 700,
						'height' => 400,
						'chart'=>array(
									'dataProvider'=>$dataProvider,
									'categoryField' => 'time'
									),
						'chartType' => 'AmSerialChart',
						'graphs'=>array(
									array(
										'valueField' => 'data',
										'title'=>'Data graph',
										'type' => 'column'
									)),
						'categoryAxis'=>array(
									'title'=>'Time'
									),
						'valueAxis'=>array(
									'title'=>'Data')
	));
	*/
	
	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options' => array(
      'title' => array('text' => 'Fruit Consumption'),
      'xAxis' => array(
         'categories' => array('Apples', 'Bananas', 'Oranges')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Fruit eaten')
      ),
      'series' => array(
         array('name' => 'Jane', 'data' => array(1, 0, 4)),
         array('name' => 'John', 'data' => array(5, 7, 3))
      )
   )
));

$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'Combination chart',
        ),
        'xAxis' => array(
            'categories' => array('Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'),
        ),
        'labels' => array(
            'items' => array(
                array(
                    'html' => 'Total fruit consumption',
                    'style' => array(
                        'left' => '50px',
                        'top' => '18px',
                        'color' => 'js:(Highcharts.theme && Highcharts.theme.textColor) || \'black\'',
                    ),
                ),
            ),
        ),
        'series' => array(
            array(
                'type' => 'column',
                'name' => 'Location',
                'data' => array(24, 29, 35),
            ),
            
            array(
                'type' => 'scatter',
                'name' => 'Average',
                'data' => array(89, 75, 93),
                'marker' => array(
                    'lineWidth' => 2,
                    'lineColor' => 'js:Highcharts.getOptions().colors[3]',
                    'fillColor' => 'white',
                ),
				'plotLines'=>array(
					'lineWidth'=>0,
					'lineColor' => 'js:Highcharts.getOptions().colors[3]',
                    'fillColor' => 'transparent',
				),
            ),
			/*
            array(
                'type' => 'pie',
                'name' => 'Total consumption',
                'data' => array(
                    array(
                        'name' => 'Jane',
                        'y' => 13,
                        'color' => 'js:Highcharts.getOptions().colors[0]', // Jane's color
                    ),
                    array(
                        'name' => 'John',
                        'y' => 23,
                        'color' => 'js:Highcharts.getOptions().colors[1]', // John's color
                    ),
                    array(
                        'name' => 'Joe',
                        'y' => 19,
                        'color' => 'js:Highcharts.getOptions().colors[2]', // Joe's color
                    ),
                ),
                'center' => array(100, 80),
                'size' => 100,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => false,
                ),
            ),
			*/
        ),
    )
));
?>