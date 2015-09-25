<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->layout='//layouts/nocolumn';
		$this->render('index');
	}
}