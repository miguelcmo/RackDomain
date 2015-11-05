<?php

class AutoTaskController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index');		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Location the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Location::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('rdt','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Location $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='location-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionUpdateTblReport()
	{
		//query the rooms in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Count(tbl_room.roomName) as total FROM tbl_location 
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId 
			GROUP BY tbl_location.locationId ';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET rooms='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		//query the rows in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Count(tbl_row.rowName) as total FROM tbl_location
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId
			INNER JOIN tbl_row ON tbl_row.roomId = tbl_room.roomId
			GROUP BY tbl_location.locationId';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET rows='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		//query the racks in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Count(tbl_rack.rackName) as total FROM tbl_location
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId
			INNER JOIN tbl_row ON tbl_row.roomId = tbl_room.roomId
			INNER JOIN tbl_rack ON tbl_rack.rowId = tbl_row.rowId
			GROUP BY tbl_location.locationId';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET racks='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		//query the objects in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Count(tbl_rack_space.objectId) as total FROM tbl_location
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId
			INNER JOIN tbl_row ON tbl_row.roomId = tbl_room.roomId
			INNER JOIN tbl_rack ON tbl_rack.rowId = tbl_row.rowId
			INNER JOIN tbl_rack_space ON tbl_rack_space.rackId = tbl_rack.rackId
			GROUP BY tbl_location.locationId';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET objects='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		//query the installed URs in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Sum(tbl_rack_type.rackUnits) as total FROM tbl_location
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId
			INNER JOIN tbl_row ON tbl_row.roomId = tbl_room.roomId
			INNER JOIN tbl_rack ON tbl_rack.rowId = tbl_row.rowId
			INNER JOIN tbl_rack_type ON tbl_rack.rackType = tbl_rack_type.rackTypeId
			GROUP BY tbl_location.locationId';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET urs='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		//query the used URs in a specific location and update data into the report table
		$q = 'SELECT tbl_location.locationId,Sum(tbl_platform.platformRackUnits) as total FROM tbl_location
			INNER JOIN tbl_room ON tbl_room.locationId = tbl_location.locationId
			INNER JOIN tbl_row ON tbl_row.roomId = tbl_room.roomId
			INNER JOIN tbl_rack ON tbl_rack.rowId = tbl_row.rowId
			INNER JOIN tbl_rack_space ON tbl_rack_space.rackId = tbl_rack.rackId
			INNER JOIN tbl_object ON tbl_rack_space.objectId = tbl_object.objectId
			INNER JOIN tbl_platform ON tbl_object.platformId = tbl_platform.platformId
			GROUP BY tbl_location.locationId';
		$cmd = Yii::app()->db->createCommand($q);
		$result = $cmd->query();
		foreach($result as $value)
		{
			$q = 'UPDATE tbl_report SET usedUrs='.$value['total'].' WHERE locationId=:locationId';
			$params = array(':locationId'=>$value['locationId']);
			Yii::app()->db->createCommand($q)->execute($params);
		}
		
		$dataProvider = new CActiveDataProvider('Report');
		$this->render('tblReportResult',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
