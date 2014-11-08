<?php
/* @var $this TratamientoController */
/* @var $model Tratamiento */

$this->breadcrumbs=array(
	'Tratamientos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tratamiento', 'url'=>array('index')),
	array('label'=>'Administrar Tratamiento', 'url'=>array('admin')),
);
?>

<h3 align="center">Crear Tratamiento</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>