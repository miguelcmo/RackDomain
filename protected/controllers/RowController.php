<?php

class RowController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	/**
	 * @var private property containing the associated Room model instance.
	 */
	private $_room = null;
	
	public $_count = null;

	public $devicesList = null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'roomContext + create index admin',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	} */
	
	public function setLocationId($id)//$id del controlador
	{
		$model = Row::model()->findByPk($id);
		$lid = $model->room->location->locationId;
		Yii::app()->user->setState('lid',$lid);
		
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->setLocationId($id);
		
		$q='SELECT tbl_rack.rackId,tbl_rack.sortOrder,tbl_rack.rackName,tbl_rack_type.thumbnailPath FROM tbl_rack
			INNER JOIN tbl_rack_type ON tbl_rack.rackType = tbl_rack_type.rackTypeId
			WHERE tbl_rack.rowId=:rowId ORDER BY tbl_rack.sortOrder ASC';
		$params=array(':rowId'=>$id);
		$cmd = Yii::app()->db->createCommand($q);
		$rackList = $cmd->query($params);
		
		$rackDataProvider=new CActiveDataProvider('Rack', array(
			'criteria'=>array(
				'select'=>'tbl_rack.rackId, tbl_rack.rackName, tbl_rack_type.thumbnailPath as rackThumb',
				'alias'=>'tbl_rack',
				'with'=>'rackType0',
				'condition'=>'rowId=:rowId',
				'join'=>'INNER JOIN tbl_rack_type ON tbl_rack_type.rackTypeId=tbl_rack.rackType',
				'params'=>array(':rowId'=>$id),
				'order'=>'sortOrder ASC',
			),
			'pagination'=>false,
		));
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'rackDataProvider'=>$rackDataProvider,
			'rackList'=>$rackList,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Row;
		
		//Assign the value of the roomId parameter before the create action
		$model->roomId = $this->_room->roomId;
		//$model->rowNameId = $this->_count;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Row']))
		{
			$this->addToReport($this->_room->location->locationId);
			
			$model->attributes=$_POST['Row'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rowId));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->setLocationId($id);
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Row']))
		{
			$model->attributes=$_POST['Row'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rowId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$rid)
	{
		$this->setLocationId($id);
		
		$model = $this->loadModel($id);
		
		$this->removeFromReport($model->room->location->locationId);
		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('room/view', 'id'=>$rid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Row');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Row('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Row']))
			$model->attributes=$_GET['Row'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Row the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Row::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('rdt','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Row $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='row-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Protected method to load the associated Room model class
	 * @param integer roomId the primary identifier of the associated Room
	 * @return object the Room data model based on the primary key
	 */
	protected function loadRoom($roomId)
	{
		//if the room property is null, create it based on input id
		if($this->_room===null)
		{
			$this->_room=Room::model()->findByPk($roomId);
			if($this->_room===null)
			{
				throw new CHttpException(404,Yii::t('rdt','The requested room does not exist.'));
			}
		}
		return $this->_room;
	}
	
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper room context
	 */
	public function filterRoomContext($filterChain)
	{
		//set the room identifier based on GET input request variables
		if(isset($_GET['rid']))
		{	
			$this->loadRoom($_GET['rid']);
			//$this->getAvailableRowName($_GET['rid']);
		}
		else {
			throw new CHttpException(403, Yii::t('rdt','Must specify a room before performing this action.'));
		}
		
		$model = Room::model()->findByPk($this->_room->roomId);
		$lid = $model->location->locationId;
		Yii::app()->user->setState('lid',$lid);
		//complete the running of other filters and execute the requested action
		$filterChain->run();
	}
	
	/**
	 * Count the total number or rows created on a specific room
	 * @param integer the value of the room id
	 * @return string with the number of the rows
	 */
	public function getAvailableRowName($roomId)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'roomId=:roomId';
		$criteria->params = array(':roomId'=>$roomId);
		$this->_count = Row::model()->count($criteria) + 1;
	
		return $this->_count;
	}
	
	public function addToReport($id)//$id is the locationId
	{
		$q = 'UPDATE tbl_report SET rows=rows+1 WHERE locationId=:locationId';
		$params = array(':locationId'=>$id);
		$cmd = Yii::app()->db->createCommand($q);
		$cmd->execute($params);
	}
	
	public function removeFromReport($id)//$id is the locationId
	{
		$q = 'UPDATE tbl_report SET rows=rows-1 WHERE locationId=:locationId';
		$params = array(':locationId'=>$id);
		$cmd = Yii::app()->db->createCommand($q);
		$cmd->execute($params);
	}
	
	public function getDevicesOnRack($rackId)
	{
		$q = 'SELECT tbl_rack_space.rackId,tbl_rack_space.initialRU,tbl_platform.platformThumbPath,tbl_rack_type.deviceTop,tbl_rack_type.deviceLeft,tbl_rack_type.thumbTopOffset,tbl_rack_type.thumbLeftOffset
			FROM tbl_rack_space
			INNER JOIN tbl_object ON tbl_rack_space.objectId = tbl_object.objectId
			INNER JOIN tbl_platform ON tbl_object.platformId = tbl_platform.platformId
			INNER JOIN tbl_rack ON tbl_rack_space.rackId = tbl_rack.rackId
			INNER JOIN tbl_rack_type ON tbl_rack.rackType = tbl_rack_type.rackTypeId
			WHERE tbl_rack_space.rackId=:rackId ORDER BY tbl_rack_space.initialRU ASC';
		$params = array(':rackId'=>$rackId);
		$cmd = Yii::app()->db->createCommand($q);
		$devicesList = $cmd->query($params);
		
		$resultThumb = '';
		foreach ($devicesList as $value){
			$left=($value['deviceLeft']/3)+$value['thumbLeftOffset'];
			$top=(($value['initialRU']-1)*4)+($value['deviceTop']/3)+$value['thumbTopOffset'];
			$resultThumb = $resultThumb.'echo CHtml::image("'.$value["platformThumbPath"].'","",array(
				"class"=>"ru", "style"=>"left:'.$left.'px;top:'.$top.'px"));';
		}
		return $resultThumb;
	}	
}


/* 
echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:77px"));
echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:105px"));
echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:125px"));
echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:145px"));
echo CHtml::image("images/devices/thumbnails/sciat-rf9900reverse2.png", array( "class"=>"ru", "style"=>"left:58px;top:165px"));
echo CHtml::image("images/devices/thumbnails/arris-c4cmts.png", array( "class"=>"ru", "style"=>"left:58px;top:185px"));
*/












