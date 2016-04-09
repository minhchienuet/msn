<?php

namespace app\controllers;

use app\models\AqiQt;
use app\models\AqiVn;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\Address;
use yii\web\Request;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['supportEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionArea()
    {
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $addresses = Address::findBySql($sql)->all();
        return $this->render('searchByArea',[
            'addresses' => $addresses,
        ]);

    }

    public function actionAqi(){
        $aqi_vn = AqiVn::find()->all();
        $aqi_qt = AqiQt::find()->all();
        return $this->render('searchByAqi',[
            'aqi_vn' => $aqi_vn,
            'aqi_qt' => $aqi_qt,
        ]);
    }

    public function actionTime(){
        return $this->render('searchByTime');
    }

    public function actionReport(){
        return $this->render('report');
    }

    public function actionWarning(){
        $aqi_vn = AqiVn::find()->all();
        $aqi_qt = AqiQt::find()->all();
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $addresses = Address::findBySql($sql)->all();
        return $this->render('warning',[
            'aqi_vn' => $aqi_vn,
            'aqi_qt' => $aqi_qt,
            'addresses' => $addresses,
        ]);
    }

    public function actionNews(){
        return $this->render('news');
    }

    public function actionDistricts(){
        if(isset($_GET['province'])) {
            $province = trim($_GET['province']);
            $sql = "SELECT DISTINCT district FROM addresses WHERE province = '".$province."' ORDER BY district ASC";
            $addresses = Address::findBySql($sql)->all();
            echo "<option value=''>--Select--</option>";
            foreach($addresses as $address){
                echo "<option value='".$address->district."'>".$address->district."</option>";
            }
        }
    }

    public function actionWards(){
        if(isset($_GET['district'])) {
            $district = trim($_GET['district']);
            $sql = "SELECT DISTINCT ward FROM addresses WHERE district = '".$district."' ORDER BY ward ASC";
            $addresses = Address::findBySql($sql)->all();
            echo "<option value=''>--Select--</option>";
            foreach($addresses as $address){
                echo "<option value='".$address->ward."'>".$address->ward."</option>";
            }
        }
    }
}
