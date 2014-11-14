<?php
/* @var $this ForoController */
/* @var $model Foro */

$this->breadcrumbs=array(
	'Foros'=>array('index'),
	$model->id_foro=>array('view','id'=>$model->id_foro),
	'Update',
);

$this->menu=array(

	array('label'=>'Ver preguntas', 'url'=>array('admin')),
);
?>

<h3 align="center">Responder Consulta</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>