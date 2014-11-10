<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado de Citas', 'url'=>array('admin')),
        array('label'=>'Agenda', 'url'=>array('agenda')),
);
?>

<h3 align="center">Crear nueva Cita</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>