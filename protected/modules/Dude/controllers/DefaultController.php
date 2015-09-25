<?php

class DefaultController extends Controller
{
	public $layout='/layouts/main';
	
	public function accessRules()
{
  return array(
    array('allow',
          'actions'=>array('ajaxrequest','indexx','index'),
          'users'=>array('*'),
    ),
    // ...
    array('deny',  // deny all users
          'users'=>array('*'),
    ),
  );
}

public function actionAjaxRequest()
{
  $val1 = $_POST['val_id'];
  
  //
  // Perform processing
  //
 
  //
  // echo the AJAX response
  //
  echo "some sort of response: $val1 : $val1";
 
  Yii::app()->end();
}
	public function actionIndexx()
	{
		$this->render('indexx');
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionCanvas()
	{
		$this->render('canvas');
	}
}