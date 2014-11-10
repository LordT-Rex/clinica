<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->id_cita=>array('view','id'=>$model->id_cita),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado de Citas', 'url'=>array('admin')),
        array('label'=>'Agenda', 'url'=>array('agenda')),
);
?>

<h3 align="center">Actualizar Cita </h3>

<?php $this->renderPartial('formActualizar', array('model'=>$model)); ?>