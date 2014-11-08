<?php
/* @var $this TratamientoController */
/* @var $model Tratamiento */

$this->breadcrumbs=array(
	'Tratamientos'=>array('index'),
	$model->id_tratamiento=>array('view','id'=>$model->id_tratamiento),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tratamiento', 'url'=>array('index')),
	array('label'=>'Crear Tratamiento', 'url'=>array('create')),

	
);
?>

<h3 align="center">Modificar Tratamiento <?php echo $model->id_tratamiento; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>