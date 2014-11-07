<?php

class BloqueNoDisponibleController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('Dentista','Asistente'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new BloqueNoDisponible;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BloqueNoDisponible'])) {
            $model->attributes = $_POST['BloqueNoDisponible'];
            $id_dia = $this->diaSemana($model->fecha);
            $bloquesArreglo = Bloque::model()->findAllBySql("select * from bloque where inicio >= "."'".$model->bloqueInicio."' and fin <= "."'".$model->bloqueFin."' and id_dia = $id_dia");
            $i = 0;
            for($i ; $i < count($bloquesArreglo) ; $i++){
                $modelOne = $bloquesArreglo[$i];
                $modeloBloqueado = new BloqueNoDisponible;
                $modeloBloqueado->id_bloque = $modelOne->id_bloque;
                $modeloBloqueado->fecha = $model->fecha;
                print_r($modeloBloqueado->errors);
                $modeloBloqueado->bloqueInicio = "algo";
                $modeloBloqueado->bloqueFin = "algo";
                $modeloBloqueado->save();
            }
            $this->redirect(array('admin'));
        }
        $this->render('create', array(
                'model' => $model,
        ));
    }

    public function diaSemana($fecha) {
        $ano = substr($fecha, -10, 4);
        $mes = substr($fecha, -5, 2);
        $dia = substr($fecha, -2, 2);
        $valor = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
        return $valor;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BloqueNoDisponible'])) {
            $model->attributes = $_POST['BloqueNoDisponible'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_no_disponible));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('BloqueNoDisponible');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BloqueNoDisponible('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BloqueNoDisponible']))
            $model->attributes = $_GET['BloqueNoDisponible'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return BloqueNoDisponible the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = BloqueNoDisponible::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param BloqueNoDisponible $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bloque-no-disponible-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
