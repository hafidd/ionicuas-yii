<?php

namespace app\controllers;

use app\models\Wisata;
use app\models\Kabupaten;
use app\models\Galery;
use app\models\Jenis;

class WisataApiController extends \yii\web\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

	// get all data wisata
	public function actionGetWisata($tipe = "", $kab = "") {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		\Yii::$app->response->headers->set('Access-Control-Allow-Origin', ['*']);
		// get data
		empty($tipe) || $tipe === 'Semua Wisata' ? $tipe = '%' : $tipe;
		empty($kab) || $kab === 'Semua Kabupaten' ? $kab = '%' : $kab;
		return Wisata::find()
		->select(['*', "COUNT(galery.gl_wis_id) AS photos"])
		->joinWith(['wisKab', 'wisJenis', 'galery'])
		->where(['like', "kabupaten.kab_nama", $kab, false])
		->andWhere(['like', "jenis.jenis_nama", $tipe, false])
		->groupBy(['wisata.wis_id'])
		->asArray()->all();
		//->all();
		//->createCommand()->getRawSql();	
		//print_r($x);
	}

	// get gallery
	public function actionGetGallery($id = "") {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		\Yii::$app->response->headers->set('Access-Control-Allow-Origin', ['*']);
		// get data
		return Galery::find()->where(['galery.gl_wis_id' => $id])->all();
	}

	// get all data kabupaten
	public function actionKabupaten() {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		\Yii::$app->response->headers->set('Access-Control-Allow-Origin', ['*']);
		return Kabupaten::find()->all();
	}

	// get all data jenis wisata
	public function actionJenis() {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		\Yii::$app->response->headers->set('Access-Control-Allow-Origin', ['*']);
		return Jenis::find()->all();
	}

}
