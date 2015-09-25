<?php

class PicsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';
	public $layout='//layouts/nocolumn';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','createID','update','admin','delete','filelist','ajaxReq','fileDelete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pics;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pics']))
		{
			$model->attributes=$_POST['Pics'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreateID($id)
	{
		$model=new Pics;
		$modelff=new FileForm;
 		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pics']))
		{
			$model->setAttributes($_POST['Pics']);
			$modelff->attributes=$_POST['FileForm'];
			$modelff->image = CUploadedFile::getInstance($modelff, 'image');
			if($model->save())
			{
				if (is_object($modelff->image)) {          
					$path='images/'.$modelff->image;
					$modelff->image->saveAs($path);
				}  
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,'ff'=>$modelff,'bbid'=>$id,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelff=new FileForm;
 		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pics']))
		{
			$model->setAttributes($_POST['Pics']);
			$modelff->attributes=$_POST['FileForm'];
			$modelff->image = CUploadedFile::getInstance($modelff, 'image');
			if($model->save())
			{
				if (is_object($modelff->image)) {          
					$path='images/'.$modelff->image;
					$modelff->image->saveAs($path);
				}  
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,'ff'=>$modelff,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('bb/admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pics');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pics('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pics']))
			$model->attributes=$_GET['Pics'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pics the loaded model
	 * @throws CHttpException
	 */
	public function actionFilelist()
	{
		$dir='images';
		$files2 = scandir($dir, 1);
		$this->render('filelist',array(
			'model'=>$files2,
		));
	}
	public function actionFileDelete($file)
	{
          @unlink(Yii::getPathOfAlias('webroot.images') . DIRECTORY_SEPARATOR . $file);
		  $this->redirect(array("filelist"));
	}
	 
	 
	public function loadModel($id)
	{
		$model=Pics::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionAjaxReq()
	{
		$val1 = $_POST['val_id'];
		echo "<img src='".Yii::app()->request->baseUrl."/images/".$val1."' >";
	}
	/**
	 * Performs the AJAX validation.
	 * @param Pics $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
