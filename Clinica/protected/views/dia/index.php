<?php
/* @var $this DiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dias',
);

$this->menu=array(
	array('label'=>'Bloquear Día en específico', 'url'=>array('diaNoDisponible/create')),
        array('label'=>'Administrar días no disponibles', 'url'=>array('diaNoDisponible/admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('dia')):?>
    <div class="grabado_ok">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('dia')); ?>
    </div>
<?php endif; ?>

<h3 align="center">Manejar disponibilidad de días</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
