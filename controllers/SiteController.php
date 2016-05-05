<?php

namespace app\controllers;

use app\models\AqiQt;
use app\models\AqiVn;
use budyaga\users\models\Node;
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
                'only' => ['logout','report'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['report'],
                        'allow' => true,
                        'roles' => ['reportView'],
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
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $addresses = Address::findBySql($sql)->all();
        return $this->render('searchByTime',[
            'addresses' => $addresses,
        ]);
    }

    public function actionReport(){
        return $this->render('report');
    }

    public function actionResult(){
            return $this->render('result');
    }

    public function actionNews(){
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $addresses = Address::findBySql($sql)->all();
        return $this->render('news',[
            'addresses' => $addresses,
        ]);
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
    public function actionNodes(){
        $province = trim($_GET['province']);
        $district = trim($_GET['district']);
        $ward = trim($_GET['ward']);
        $sql = "SELECT * FROM addresses
                    WHERE province = '".$province."' AND district = '".$district."' AND ward = '".$ward."'
                    ORDER BY district ASC";
        $address = Address::findBySql($sql)->one();
        $sql = "SELECT * FROM nodes WHERE address_id = '".$address->id."' ";
        $nodes = Node::findBySql($sql)->all();
        echo "<option value=''>--Select--</option>";
        foreach($nodes as $node){
            echo "<option data-toggle = 'tooltip' data-placement = 'left' title='".$node->description."'
                        value='".$node->id."'>".$node->name."</option>";
        }
    }
}
