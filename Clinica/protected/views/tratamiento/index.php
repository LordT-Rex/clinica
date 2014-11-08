<?php
/* @var $this TratamientoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tratamientos',
);

$this->menu=array(
	array('label'=>'Crear Tratamiento', 'url'=>array('create')),
	array('label'=>'Administrar Tratamiento', 'url'=>array('admin')),
);
?>
<h3 align="center">Tratamientos</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
