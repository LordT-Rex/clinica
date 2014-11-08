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

<h1>Create Tratamiento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>