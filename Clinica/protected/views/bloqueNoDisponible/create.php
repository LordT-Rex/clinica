<?php
/* @var $this BloqueNoDisponibleController */
/* @var $model BloqueNoDisponible */

$this->breadcrumbs=array(
	'Bloque No Disponibles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar bloques no disponibles', 'url'=>array('admin')),
);
?>

<h3 align="center">Inhabilitar Bloque en Específico</h3>

<?php?>
    <div class="grabado_ok">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, '<strong>Cuidado</strong> revisar si existen citas agendadas al inhabilitar bloques'); ?>
    </div>
<?php?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>