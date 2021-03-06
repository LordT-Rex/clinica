<?php
/* @var $this BloqueNoDisponibleController */
/* @var $model BloqueNoDisponible */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'bloque-no-disponible-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'attribute' => "fecha",
            'model' => $model,
            'language' => 'es',
            'value' => $model->fecha,
            'language' => 'es',
            'htmlOptions' => array('readonly' => "readonly"),
            'options' => array(
                'autoSize' => true,
                'buttonImage' => Yii::app()->baseUrl . '/images/calendar.png',
                'buttonImageOnly' => true,
                'dateFormat' => 'yy-mm-dd',
                'showButtonPanel' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'minDate' => '1',
                'showOtherMonths' => true,
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'yearRange' => '-80',
            ),
        ))
        ?>
        <?php echo $form->error($model, 'fecha'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'bloqueInicio'); ?>
        <?php echo $form->dropDownList($model, 'bloqueInicio', $model->getMenuHoras()); ?>
        <?php echo $form->error($model, 'bloqueInicio'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'bloqueFin'); ?>
        <?php echo $form->dropDownList($model, 'bloqueFin', $model->getMenuHorasFin()); ?>
        <?php echo $form->error($model, 'bloqueFin'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->