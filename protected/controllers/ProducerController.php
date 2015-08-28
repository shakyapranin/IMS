<?php

class ProducerController extends GxController {

	public $layout = "//layouts/admin_layout";

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Producer'),
		));
	}

	public function actionCreate() {
		$model = new Producer;


		if (isset($_POST['Producer'])) {
			$model->setAttributes($_POST['Producer']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Producer');


		if (isset($_POST['Producer'])) {
			$model->setAttributes($_POST['Producer']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Producer')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Producer');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Producer('search');
		$model->unsetAttributes();

		if (isset($_GET['Producer']))
			$model->setAttributes($_GET['Producer']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}