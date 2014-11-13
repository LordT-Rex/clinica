<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitud',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'attribute'=>"fecha",
                'model'=>$model,
                'language'=>'es',
                'value'=>$model->fecha,
                'language' => 'es',
               
                    'options'=>array(
                        'autoSize'=>true,
                        
                        'buttonImageOnly'=>true,
                        'dateFormat'=>'yy-mm-dd',
                        'showButtonPanel'=>true,
                        'changeMonth'=>true,
                        'changeYear'=>true,
                        'minDate'=>'1',
                        'showOtherMonths'=>true,
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                        'yearRange'=>'-80',
                ),
            ))?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	<div class="row buttons">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Siguiente' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>
        <div id="social">
    Siguenos en nuestras redes sociales
    <a target="_blank" href="https://www.facebook.com/clinicadental.elroble"><img src="slider/fb.png" width="50" height="50" /></a>
    <a target="_blank" href="https://twitter.com/clinica_elroble"><img src="slider/tw.png" width="50" height="50" /></a>
</div>
<div id="footer"><span class="pie">Lunes a Viernes de 9:30 a 13:00 hrs. 15:30 a 20:00 hrs. / Sábados 9:00 a 13:00 hrs.</strong>
        informaciones@clinicadentalelroble.cl - (72) 2 23 25 75 - (72) 2 22 90 31</span><br />
    <span class="creditos"> Copyright &copy; Desarrollado por Jordan Arteaga - Geraldine Bustos</span>
</div>


</div><!-- form -->