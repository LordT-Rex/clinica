<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Cita', 'url'=>array('create')),
        array('label'=>'Agenda', 'url'=>array('agenda')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cita-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php if(Yii::app()->user->hasFlash('contact')):?>
    <div class="grabado_ok">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('contact')); ?>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="grabado_ok">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error')); ?>
    </div>
<?php endif; ?>

<h3 align="center">Citas</h3>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'cita-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_cita',
                array(
                    'name'=>'paciente',
                    'value'=>'$data->rutPaciente->nombre_paciente',
                ),
                array(
                    'name'=>'apellidos',
                    'value'=>'$data->rutPaciente->apellidos_paciente',
                ),
		'rut_paciente',
		'estado_cita',
		'fecha',
		//'id_bloque',
                array(
                    'name'=>'hora',
                    'value'=> '$data->idBloque->inicio',
                ),
                array(
                    'name'=>'fin',
                    'value'=> '$data->idBloque->fin',
                ),
		array(
			'class'=>'CButtonColumn',
                        'template' => '{update}{delete}',
		),
	),
)); ?>
