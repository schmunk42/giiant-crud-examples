<?php

namespace giiant\sakila\controllers;

use giiant\sakila\models\DeptEmp;
use giiant\sakila\models\search\DeptEmp as DeptEmpSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;

/**
 * DeptEmpController implements the CRUD actions for DeptEmp model.
 */
class DeptEmpController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' 	=> true,
						'actions'   => ['index', 'view', 'create', 'update', 'delete'],
						'roles'     => ['@']
					]
				]
			]
		];
	}

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            return true;
        } else {
            return false;
        }
    }

	/**
	 * Lists all DeptEmp models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new DeptEmpSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single DeptEmp model.
	 * @param integer $emp_no
	 * @param string $dept_no
     *
	 * @return mixed
	 */
	public function actionView($emp_no, $dept_no)
	{
        $resolved = \Yii::$app->request->resolve();
        $resolved[1]['_pjax'] = null;
        $url = Url::to(array_merge(['/'.$resolved[0]],$resolved[1]));
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember($url);
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($emp_no, $dept_no),
		]);
	}

	/**
	 * Creates a new DeptEmp model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DeptEmp;

		try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing DeptEmp model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $emp_no
	 * @param string $dept_no
	 * @return mixed
	 */
	public function actionUpdate($emp_no, $dept_no)
	{
		$model = $this->findModel($emp_no, $dept_no);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing DeptEmp model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $emp_no
	 * @param string $dept_no
	 * @return mixed
	 */
	public function actionDelete($emp_no, $dept_no)
	{
        try {
            $this->findModel($emp_no, $dept_no)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$emp_no, $dept_no',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
	}

	/**
	 * Finds the DeptEmp model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $emp_no
	 * @param string $dept_no
	 * @return DeptEmp the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($emp_no, $dept_no)
	{
		if (($model = DeptEmp::findOne(['emp_no' => $emp_no, 'dept_no' => $dept_no])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
