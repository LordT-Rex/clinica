<?php

class CitaController extends Controller {

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
            array('allow',
                'actions' => array('solicitud', 'citaReservada'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'existePaciente', 'agenda', 'calendar'),
                'users' => array('Dentista', 'Asistente'),
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
        $model = new Cita;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($model->fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $modelCita = Cita::model()->findByAttributes(array('fecha' => $model->fecha, 'id_bloque' => $modelBloque->id_bloque, 'estado_cita' => 'Confirmada'));
            $modelBloqueBloqueado = false;
            if ($id_dia != 0) {
                $modelBloqueBloqueado = BloqueNoDisponible::model()->findByAttributes(array('id_bloque' => $modelBloque->id_bloque, 'fecha' => $model->fecha));
            }
            $paciente = Paciente::model()->findByPk($model->rut_paciente);
            $modelDiaBloqueado = DiaNoDisponible::model()->findByAttributes(array('id_dia' => $id_dia, 'fecha' => $model->fecha));
            if ($paciente && $id_dia != 0 && !$modelDiaBloqueado && $modelBloque->estado == "Disponible" && !$modelBloqueBloqueado && !$modelCita && !$model->fecha == "") {
                $model->id_bloque = $modelBloque->id_bloque;
                $model->estado_cita = "Confirmada";
                if ($model->save()) {
                    ini_set('max_execution_time', 300);
                    
                }
            } else {
                if ($id_dia == 0) {
                    $model->addError('fecha', 'Los días domingo no están disponibles');
                }
                if (!$paciente) {
                    $model->addError('rut_paciente', 'El paciente no se encuentra registrado');
                }
                if ($modelBloqueBloqueado) {
                    $model->addError('hora', 'El bloque seleccionado no se encuentra disponible');
                }
                if ($modelBloque) {
                    if ($modelBloque->estado != "Disponible") {
                        $model->addError('hora', 'El bloque seleccionado no se encuentra disponible');
                    }
                }
                if ($modelDiaBloqueado) {
                    $model->addError('fecha', 'El día seleccionado no se encuentra disponible');
                }
                if ($modelCita) {
                    $model->addError('fecha', 'Ya existe una cita confirmada en este horario y fecha');
                }
                if ($model->fecha == "") {
                    $model->addError('fecha', 'La fecha es obligatoria');
                }

                $this->render('create', array('model' => $model));
            }
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    public function diaSemana($fecha) {
        $ano = substr($fecha, -10, 4);
        $mes = substr($fecha, -5, 2);
        $dia = substr($fecha, -2, 2);
        $valor = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
        return $valor;
    }

    public function actionSolicitud() {
        $solicitud = new SolicitudCita();
        $model = new Cita();
        if (isset($_POST['SolicitudCita'])) {
            $solicitud->attributes = $_POST['SolicitudCita'];
            if ($solicitud->fecha != "") {
                $id_dia = $this->diaSemana($solicitud->fecha);
                $modelDia = Dia::model()->findByPk($id_dia);
                $modelDiaBloqueado = DiaNoDisponible::model()->findByAttributes(array('id_dia' => $id_dia, 'fecha' => $solicitud->fecha));
                if ($modelDia->estado_dia == "Activo" && !$modelDiaBloqueado && $id_dia != 0) {
                    $this->redirect(array('CitaReservada', 'fecha' => $solicitud->fecha));
                } else {
                    if ($id_dia == 0) {
                        $solicitud->addError('fecha', 'Los días domingo no se realizan atenciones');
                        $this->render('solicitudCita', array('model' => $solicitud));
                    } else {
                        $solicitud->addError('fecha', 'La fecha seleccionada no se encuentra disponible para atención');
                        $this->render('solicitudCita', array('model' => $solicitud));
                    }
                }
            } else {
                $solicitud->addError('fecha', 'La fecha es obligatoria');
                $this->render('solicitudCita', array('model' => $solicitud));
            }
        } else {
            $this->render('solicitudCita', array('model' => $solicitud));
        }
    }

    public function actionCitaReservada($fecha) {
        $model = new Cita();
        $model->fecha = $fecha;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $model->estado_cita = "Reservada";
            $model->id_bloque = $modelBloque->id_bloque;
            if ($model->save()) {
                $this->redirect(array('site/index'));
            } else {
                $this->render('bloquesDisponibles', array('fecha' => $fecha, 'model' => $model));
            }
        } else {
            $this->render('bloquesDisponibles', array('fecha' => $fecha, 'model' => $model));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $paciente = Paciente::model()->findByPk($model->rut_paciente);
        $model->paciente = $paciente->nombre_paciente;
        $model->apellidos = $paciente->apellidos_paciente;
        $model->direccion = $paciente->direccion_paciente;
        $model->telefono = $paciente->telefono_paciente;
        $model->ciudad = $paciente->ciudad_paciente;
        $modelBloque = Bloque::model()->findByPk($model->id_bloque);
        $model->hora = $modelBloque->inicio;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($model->fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $model->id_bloque = $modelBloque->id_bloque;
            $modelCita = Cita::model()->findByAttributes(array('fecha' => $model->fecha, 'id_bloque' => $model->id_bloque, 'estado_cita' => 'Confirmada'));
            if (!$modelCita || $modelCita->id_cita == $model->id_cita) {
                if ($model->save())
                    $this->redirect(array('admin'));
            }else {
                echo $model->hora;
                $model->addError('fecha', 'Ya existe una cita confirmada en este horario y fecha');
                $this->render('update', array(
                    'model' => $model,
                ));
            }
        } else {
            $this->render('update', array(
                'model' => $model,
            ));
        }
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
        $dataProvider = new CActiveDataProvider('Cita');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cita('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cita']))
            $model->attributes = $_GET['Cita'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cita the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cita::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cita $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cita-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAgenda() {
        $this->render('agenda');
    }

    public function actionExistePaciente() {
        if ($_POST['rut_paciente']) {
            $rut_paciente = $_POST['rut_paciente'];
            $datos = Yii::app()->db->createCommand("SELECT nombre_paciente , apellidos_paciente , ciudad_paciente , telefono_paciente , direccion_paciente FROM PACIENTE WHERE rut_paciente = " . "'" . $rut_paciente . "'")->queryAll();
            echo(($datos) ? json_encode($datos) : '');
        }
    }

    public function actionCalendar() {
        $items = array();
        $model = Cita::model()->findAll();
        foreach ($model as $value) {
            if ($value->estado_cita == "Confirmada") {
                $color = '#005FFF';
            } else {
                $color = '#FF0000';
            }
            $paciente = Paciente::model()->findByPk($value->rut_paciente);
            $bloque = Bloque::model()->findByPk($value->id_bloque);
            $items[] = array(
                'id' => $value->id_cita,
                'title' => $paciente->nombre_paciente . " " . $paciente->apellidos_paciente,
                'start' => $value->fecha . " " . $bloque->inicio,
                'end' => $value->fecha . " " . $bloque->fin,
                'color' => $color,
                'allDay' => false,
                'editable' => false,
                'url' => $this->createUrl('cita/update', array('id' => $value->id_cita)),
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }

}
