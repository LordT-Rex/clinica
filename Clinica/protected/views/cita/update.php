<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->id_cita=>array('view','id'=>$model->id_cita),
	'Update',
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h3 align="center">Actualizar Cita </h3>

<?php $this->renderPartial('formActualizar', array('model'=>$model)); ?>