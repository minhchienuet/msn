<?php

namespace app\controllers;

use Yii;
use app\models\Node;
use app\models\NodeSearch;
use app\models\Address;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * NodeController implements the CRUD actions for Node model.
 */
class NodeController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'admin_page';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Node models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Node model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $node = Node::findOne($id);
        $sql = "SELECT * FROM addresses WHERE id =$node->address_id ";
        $address = Address::findBySql($sql)->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'address' => $address,

        ]);
    }

    /**
     * Creates a new Node model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $node = new Node();
        $address = new Address();

        if ($node->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post()) && Model::validateMultiple([$node, $address])) {
                $address->save(false);// skip validation as model is already validated
                $node->address_id = $address->id; // no need for validation rule on user_id as you set it yourself
                $node->save(false);
                return $this->redirect(['view', 'id' => $node->id]);

        } else {
            return $this->render('create', [
                'node' => $node,
                'address' => $address,
            ]);
        }
    }

    /**
     * Updates an existing Node model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $node = Node::findOne($id);
        $sql = "SELECT * FROM addresses WHERE id =$node->address_id ";
        $address = Address::findBySql($sql)->one();
        if ($node->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post()) && Model::validateMultiple([$node, $address]) ) {
            $node->save(false);
            $address->save(false);

            return $this->redirect(['view', 'id' => $node->id]);
        }
        return $this->render('update', [
            'node' => $node,
            'address' => $address,
        ]);
    }

    /**
     * Deletes an existing Node model.
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
     * Finds the Node model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Node the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Node::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
