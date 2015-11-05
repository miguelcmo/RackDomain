<?php

class PduController extends Controller
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
	}
	*/
	
	public function setLocationId($id)//$id del controlador
	{
		$model = Pdu::model()->findByPk($id);
		$lid = $model->room->location->locationId;
		Yii::app()->user->setState('lid',$lid);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)//this is pduId
	{
		$this->setLocationId($id);
		//$pduTypeId = $this->loadModel($id)->pduTypeId;
		//$pduCircuits = new PduCircuits::model()->findByPk($pduTypeId);
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'pduId=:pduId AND pduCircuitState=:pduCircuitState';
		$criteria->params = array(':pduId'=>$id, ':pduCircuitState'=>1);
		$freeCircuits = PduCircuits::model()->count($criteria);
		
		$criteria->params = array(':pduId'=>$id, ':pduCircuitState'=>2);
		$installedCircuits = PduCircuits::model()->count($criteria);
		
		$criteria->params = array(':pduId'=>$id, ':pduCircuitState'=>3);
		$reservedCircuits = PduCircuits::model()->count($criteria);
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'freeCircuits'=>$freeCircuits,
			'installedCircuits'=>$installedCircuits,
			'reservedCircuits'=>$reservedCircuits,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pdu;

		//Assign the value of the roomId parameter before the create action
		$model->roomId = $this->_room->roomId;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pdu']))
		{
			
			$model->attributes=$_POST['Pdu'];
			
			if($model->save())
				$this->createPduCircuits($model->pduId,$_POST['Pdu']['pduTypeId']);
				$this->redirect(array('view','id'=>$model->pduId));
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

		if(isset($_POST['Pdu']))
		{
			$model->attributes=$_POST['Pdu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pduId));
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
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('room/view', 'id'=>$rid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pdu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pdu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pdu']))
			$model->attributes=$_GET['Pdu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Assign an object to a PduCircuit by MAC
	 */
	public function actionAssignCircuit($id)//$id is pduId
	{
		$model = $this->loadModel($id);
		$locationId = $model->room->location->locationId;
		
		$modelPduCircuits = new PduCircuits;
		$modelRoom = new Room;
		$modelRow = new Row;
		$modelRack = new Rack;
	
		// Assign the pduId value to the modelPduCircuits
		$modelPduCircuits->pduId = $id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// generates the lists for the PDU Circuits View Table by MAC
		$criteria = new CDbCriteria();
		$criteria->condition = 'pduId=:pduId AND pduCircuitBus=:pduCircuitBus';
		$criteria->params = array(':pduId'=>$id, ':pduCircuitBus'=>'A');
		$criteria->order = 'pduCircuitNumber ASC';
		$circuitBusA = PduCircuits::model()->findAll($criteria);
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'pduId=:pduId AND pduCircuitBus=:pduCircuitBus';
		$criteria->params = array(':pduId'=>$id, ':pduCircuitBus'=>'B');
		$criteria->order = 'pduCircuitNumber ASC';
		$circuitBusB = PduCircuits::model()->findAll($criteria);
		
		
		if(isset($_POST['PduCircuits']))
		{
			//$modelPduCircuits->attributes=$_POST['PduCircuits'];
			$criteria = new CDbCriteria();
			$criteria->condition = 'pduId=:pduId AND pduCircuitBus=:pduCircuitBus AND pduCircuitNumber=:pduCircuitNumber';
			$criteria->params = array(
				':pduId'=>$id, 
				':pduCircuitBus'=>$_POST['PduCircuits']['pduCircuitBus'],
				':pduCircuitNumber'=>$_POST['PduCircuits']['pduCircuitNumber'],
			);
			$modelPduCircuits = PduCircuits::model()->find($criteria);
			
			$valid = $this->validateIfCircuitIsInUse($id,$_POST['PduCircuits']['pduCircuitBus'],$_POST['PduCircuits']['pduCircuitNumber']);
			
			if($valid)
			{
				//$modelPduCircuits->pduId = $id;
				//$modelPduCircuits->attributes=$_POST['PduCircuits'];
				
				$modelPduCircuits->pduId = $id;
				$modelPduCircuits->objectId = $_POST['PduCircuits']['objectId'];
				$modelPduCircuits->pduCircuitBus = $_POST['PduCircuits']['pduCircuitBus'];
				$modelPduCircuits->pduCircuitNumber = $_POST['PduCircuits']['pduCircuitNumber'];
				$modelPduCircuits->pduCircuitState = 2;
				$modelPduCircuits->breakerRate = $_POST['PduCircuits']['breakerRate'];
				$modelPduCircuits->breakerState = $_POST['PduCircuits']['breakerState'];
				$modelPduCircuits->pduCircuitDescription = $_POST['PduCircuits']['pduCircuitDescription'];
				
				if($modelPduCircuits->save())
					$this->redirect(array('assignCircuit','id'=>$model->pduId));
			} else
				throw new CHttpException(409, Yii::t('rdt','The requested circuit is already in use, go back and select another circuit.'));
		}

		$this->render('assignCircuit',array(
			'model'=>$model,
			'modelPduCircuits'=>$modelPduCircuits,
			'modelRoom'=>$modelRoom,
			'modelRow'=>$modelRow,
			'modelRack'=>$modelRack,
			'circuitBusA'=>$circuitBusA,
			'circuitBusB'=>$circuitBusB,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pdu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pdu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('rdt','The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pdu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pdu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Protected methos to load the associated Room model class
	 * @param integer roomId the primary identifier of the associated Room
	 * @return object the Room data model based on the primary key
	 */
	public function loadRoom($roomId)
	{
		//if the room property is null, create it based on input id
		if($this->_room===null)
		{
			$this->_room=Room::model()->findByPk($roomId);
			if($this->_room===null)
			{
				throw new CHttpException(404, Yii::t('rdt','The requested room does not exits.'));
			}
		}
		return $this->_room;
	}
	
	/**
	 * In-class defined filter method, configured for use in the above filters()
	 * method. It is called before the actionCreate() action method is run in
	 * order to ensure a proper room context.
	 */
	public function filterRoomContext($filterChain)
	{
		//set the room identiffier based on GET input request variables
		if(isset($_GET['rid']))
		{
			$this->loadRoom($_GET['rid']);
		}
		else {
			throw new CHttpException(403, Yii::t('rdt','Must specify a room before performing this action.'));
		}
		
		$model = Room::model()->findByPk($this->_room->roomId);
		$lid = $model->location->locationId;
		Yii::app()->user->setState('lid',$lid);
		//complete the running of the filters and execute the requested action
		$filterChain->run();
	}
	
	/**
	 * @return list of available option for pdu type selection in the action create
	 */
	public function getAvailablePduTypeOptions()
	{
		$pduType=PduType::model()->findAll();
		return CHtml::listData($pduType, 'pduTypeId', 'pduTypeName');
	}
	
	/**
	 * @return a list of Rooms asociated with the Location in which was created the Pdu by MAC
	 */
	public function actionRoomOptions($id)
	{
		$model = $this->loadModel($id);
		$locationId = $model->room->location->locationId;
		
		$criteria = New CDbCriteria();
		$criteria->condition = 'locationId=:locationId';
		$criteria->params = array(':locationId'=>$locationId);
		$roomOptions = Room::model()->findAll($criteria);
		return CHtml::listData($roomOptions,'roomId','roomName');
	}
	
	/**
	 * @return a list of Rows asociated with the Room selected in the dropdown by MAC
	 */
	public function actionRowOptions()
	{
		$criteria = New CDbCriteria();
		$criteria->condition = 'roomId=:roomId';
		$criteria->params = array(':roomId'=>$_POST['Room']['roomId']);
		$rowOptions = Row::model()->findAll($criteria);
		$row = CHtml::listData($rowOptions,'rowId','rowName');
		echo "<option value=''>-- Select an option to filter --</option>";
		foreach($row as $value=>$rowName)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($rowName),true);
		}
	}
	
	/**
	 * @return a list of Racks asociated with the Row selected in the dropdown by MAC
	 */
	public function actionRackOptions()
	{
		$criteria = New CDbCriteria();
		$criteria->condition = 'rowId=:rowId';
		$criteria->params = array(':rowId'=>$_POST['rowId']);
		$rackOptions = Rack::model()->findAll($criteria);
		$rack = CHtml::listData($rackOptions,'rackId','rackName');
		echo "<option value=''>-- Select an option to filter --</option>";
		foreach($rack as $value=>$rackName)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($rackName),true);
		}
	}
	
	/**
	 * @return a lisr of Objects asociated with the Rack selected in the dropdown by MAC
	 */
	public function actionObjectOptions()
	{
		$criteria = New CDbCriteria();
		$criteria->select = 'tbl_object.objectId, tbl_object.objectName';
		$criteria->alias = 'tbl_object';
		$criteria->with = 'tblRacks';
		//$criteria->join = 'INNER JOIN tbl_object ON tbl_rack_space.objectId = tbl_object.objectId';
		$criteria->join = 'INNER JOIN tbl_rack_space ON tbl_rack_space.objectId = tbl_object.objectId';
		$criteria->condition = 'tbl_rack_space.rackId=:rackId';
		$criteria->params = array(':rackId'=>$_POST['rackId']);
		$objectOptions = Object::model()->findAll($criteria);
		$object = CHtml::listData($objectOptions,'objectId','objectName');
		echo "<option value=''>-- Select an Object --</option>";
		foreach($object as $value=>$objectName)
		{
			echo CHtml::tag('option',array('value'=>$value),CHtml::encode($objectName),true);
		}
	}
	
	/**
	 * @return an array of the available circuits dependent on the PduType wich is edited by MAC
	 */
	public function getAvailableCircuits($pduId)
	{
			$criteria = new CDbCriteria();
			$criteria->select = 'tbl_pdu_type.pduCircuits';
			$criteria->alias = 'tbl_pdu_type';
			$criteria->join = 'INNER JOIN tbl_pdu ON tbl_pdu.pduTypeId = tbl_pdu_type.pduTypeId';
			$criteria->condition = 'tbl_pdu.pduId=:pduId';
			$criteria->params = array(':pduId'=>$pduId);
			$pduType = PduType::model()->find($criteria);
			$circuits = $pduType->pduCircuits;
			
			$circuitsArray=array();
			
			for($i=1;$i<$circuits+1;$i++)
			{
				$circuitsArray[$i]=$i;
			}
			
			return $circuitsArray;
	}
	
	/**
	 * @return boolean verify if the circuit exists in Pdu by MAC
	 */
	public function validateIfCircuitIsInUse($pduId,$pduCircuitBus,$pduCircuitNumber)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'pduId=:pduId AND pduCircuitBus=:pduCircuitBus AND pduCircuitNumber=:pduCircuitNumber';
		$criteria->params = array(':pduId'=>$pduId, ':pduCircuitBus'=>$pduCircuitBus, ':pduCircuitNumber'=>$pduCircuitNumber);
		return PduCircuits::model()->exists($criteria);
	}
	
	/**
	 * @return boolean if it is possible to create the circuits in model PduCircuits having the pduType passed as a parameter by MAC
	 */
	public function createPduCircuits($pduId,$pduTypeId)
	{
		$pduType = PduType::model()->findByPk($pduTypeId);
		$pduCircuits = $pduType->pduCircuits;
		$pduBuses = $pduType->pduBuses;
		
		for($i=1;$i<$pduCircuits+1;$i++)
		{
			$model = new PduCircuits;
			$model->pduId = $pduId;
			$model->objectId = 0;//No Object
			$model->pduCircuitBus = 'A';
			$model->pduCircuitNumber = $i;
			$model->pduCircuitState = 1;
			$model->breakerRate = 10;//No Breaker
			$model->breakerState = 0;//Breaker OFF
			$model->pduCircuitDescription = 'No description';
						
			$model->save();
		}
		if($pduBuses==2)
		{
			for($i=1;$i<$pduCircuits+1;$i++)
			{
				$model = new PduCircuits;
				$model->pduId = $pduId;
				$model->objectId = 0;//No Object
				$model->pduCircuitBus = 'B';
				$model->pduCircuitNumber = $i;
				$model->pduCircuitState = 1;
				$model->breakerRate = 10;//No Breaker
				$model->breakerState = 0;//Breaker OFF
				$model->pduCircuitDescription = 'No description';
						
				$model->save();
			}
		}
	}
	
	public function getBreakerRateOptions()
	{
		$breakerRate = BreakerRate::model()->findAll();
		return CHtml::listData($breakerRate, 'breakerRateId', 'breakerRate');
	}
}







