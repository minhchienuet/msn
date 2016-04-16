<?php

namespace app\controllers;

use app\models\Node;
use Yii;
use app\models\Warning;
use app\models\Address;
use app\models\AqiVn;
use app\models\AqiQt;
use app\models\WarningSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * WarningController implements the CRUD actions for Warning model.
 */
class WarningController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','register','update','view'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Warning models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WarningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList()
    {
        $id = Yii::$app->user->identity->id;
        $sql = "SELECT * FROM warnings WHERE user_id = '".$id."' ORDER BY id ";
        $query = Warning::findBySql($sql);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Warning model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Warning model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegister()
    {
        $model = new Warning();
        $aqi_vn = AqiVn::find()->all();
        $aqi_qt = AqiQt::find()->all();
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $provinces = Address::findBySql($sql)->all();
        if(Yii::$app->request->post()){
            $model->user_id = Yii::$app->request->post('user_id');
            $model->node_id = Yii::$app->request->post('node_id');
            $model->standard = Yii::$app->request->post('standard');
            $model->level = Yii::$app->request->post('level');
            $model->time_interval = Yii::$app->request->post('time_interval');
            $model->email = Yii::$app->request->post('email');
            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', 'Register Successfully! ');
                 return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error', "Oops! Something wrong! Please fill all fields are required! ");
                return $this->redirect('register');
            }
        } else {
            return $this->render('register',[
                'model'  => $model,
                'aqi_vn' => $aqi_vn,
                'aqi_qt' => $aqi_qt,
                'provinces' => $provinces,
            ]);
        }
    }

    /**
     * Updates an existing Warning model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
        $model =  $this->findModel($id);
        $aqi_vn = AqiVn::find()->all();
        $aqi_qt = AqiQt::find()->all();
        $sql = "SELECT DISTINCT province FROM addresses ORDER BY province ASC" ;
        $provinces = Address::findBySql($sql)->all();
        if(Yii::$app->request->post()){
            $model->user_id = Yii::$app->request->post('user_id');
            $model->node_id = Yii::$app->request->post('node_id');
            $model->standard = Yii::$app->request->post('standard');
            $model->level = Yii::$app->request->post('level');
            $model->time_interval = Yii::$app->request->post('time_interval');
            $model->email = Yii::$app->request->post('email');
            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', 'Update Successfully! ');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error', "Oops! Something wrong! Please fill all fields are required! ");
                return $this->redirect(['update','id' => $model->id]);
            }
        } else {
            return $this->render('update',[
                'model' => $model,
                'aqi_vn' => $aqi_vn,
                'aqi_qt' => $aqi_qt,
                'provinces' => $provinces,
            ]);
        }
    }

    /**
     * Deletes an existing Warning model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Warning model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Warning the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Warning::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
