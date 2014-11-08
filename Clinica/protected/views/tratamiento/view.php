<?php
/* @var $this TratamientoController */
/* @var $model Tratamiento */

$this->breadcrumbs=array(
	'Tratamientos'=>array('index'),
	$model->id_tratamiento,
);

$this->menu=array(
	array('label'=>'Volver', 'url'=>array('index')),
	
	array('label'=>'Manejar Tratamiento', 'url'=>array('admin')),
);
?>

<h1>View Tratamiento #<?php echo $model->id_tratamiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tratamiento',
		'nombre',
		'descripcion',
                'valor',
	),
)); ?>
