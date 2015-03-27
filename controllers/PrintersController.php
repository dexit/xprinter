<?php

namespace app\controllers;

use Yii;
use app\models\Printers;
use app\models\Works;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;
use app\models\PrinterSearch;

/**
 * PrintersController implements the CRUD actions for Printers model.
 */
class PrintersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Printers models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$dataProvider = new ActiveDataProvider([
            'query' => Printers::find(),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);*/

        $searchModel = new PrinterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Printers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$works = Works::findAll(['id_printers'=> $id]);
        $worksProvider = new ActiveDataProvider([
            //'query'=>Works::findAll(['id_printers'=> $id]),
            'query'=>Works::find()->where(['id_printers'=> $id]),
            'pagination' => [
                'pageSize' => 40,
            ],
            'sort'=>[
                'attributes'=>[
                    'date'=>[
                        'asc'=>['date'=>SORT_ASC],
                        'desc'=>['date'=>SORT_DESC],
                        //'default'=>'date SORT_DESC',
                    ],
                    'summ',
                ]
            ]
        ]);
        $worksProvider->setSort(['defaultOrder'=>['date'=>SORT_DESC],]);
        /*$worksProvider = new ArrayDataProvider([
            'allModels'=>$works,
            'id'=>'date',
            'sort'=>[
                 'attributes'=>[
                     'date'=>[
                            'asc'=>['sort_date'=>SORT_ASC],
                            //'desc'=>['sort_date'=>SORT_DESC],
                            'default'=>SORT_ASC,
                        ],
                     'summ'
                 ],
                //'default'=>'date ASC',
             ]
        ]);
        $worksProvider->sort->defaultOrder = "date ASC";*/
   //var_dump($worksProvider);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'works' => $worksProvider,
        ]);
    }

    /**
     * Creates a new Printers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Printers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Printers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_printers]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Printers model.
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
     * Finds the Printers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Printers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Printers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
