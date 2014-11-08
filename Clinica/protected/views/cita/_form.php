<?php
/* @var $this CitaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cita-form',
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
        <?php echo $form->labelEx($model, 'rut_paciente'); ?>
        <?php echo $form->textField($model, 'rut_paciente', array('size' => 20, 'maxlength' => 20, 'id' => 'rut_paciente')); ?>
        <?php echo $form->error($model, 'rut_paciente'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'paciente'); ?>
        <?php echo $form->textField($model, 'paciente', array('size' => 20, 'maxlength' => 20, 'id' => 'paciente', 'readOnly'=>true)); ?>
        <?php echo $form->error($model, 'paciente'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'apellidos'); ?>
        <?php echo $form->textField($model, 'apellidos', array('size' => 30, 'maxlength' => 30, 'id' => 'apellidos','readOnly'=>true)); ?>
        <?php echo $form->error($model, 'apellidos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'direccion'); ?>
        <?php echo $form->textField($model, 'direccion', array('size' => 30, 'maxlength' => 30, 'id' => 'direccion','readOnly'=>true)); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ciudad'); ?>
        <?php echo $form->textField($model, 'ciudad', array('size' => 20, 'maxlength' => 20, 'id' => 'ciudad','readOnly'=>true)); ?>
        <?php echo $form->error($model, 'ciudad'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telefono'); ?>
        <?php echo $form->textField($model, 'telefono', array('size' => 20, 'maxlength' => 20, 'id' => 'telefono','readOnly'=>true)); ?>
        <?php echo $form->error($model, 'telefono'); ?>
    </div>

    <script>
        $('#rut_paciente').on('keyup', function() {
            $.ajax({
                url: <?php echo "'".CController::createUrl('cita/ExistePaciente')."'"; ?>,
                data: {'rut_paciente': $('#rut_paciente').val()},
                type: "post",
                success: function(data) {
                    var retrievedJSON = data;
                    var array = JSON.parse(retrievedJSON);
                    paciente.value = array[0].nombre_paciente;
                    paciente.disabled = true;
                    apellidos.value = array[0].apellidos_paciente;
                    apellidos.disabled = true;
                    ciudad.value = array[0].ciudad_paciente;
                    ciudad.disabled = true;
                    direccion.value = array[0].direccion_paciente;
                    direccion.disabled = true;
                    telefono.value = array[0].telefono_paciente;
                    telefono.disabled = true;
                }
            });
        });
    </script>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'attribute' => "fecha",
            'model' => $model,
            'language' => 'es',
            'value' => $model->fecha,
            'language' => 'es',
            'options' => array(
                'autoSize' => true,
                'buttonImage' => Yii::app()->baseUrl . '/images/calendar.png',
                'buttonImageOnly' => true,
                'dateFormat' => 'yy-mm-dd',
                'showButtonPanel' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'minDate' => '0',
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
        <?php echo $form->labelEx($model, 'hora'); ?>
        <?php echo $form->dropDownList($model, 'hora', $model->getMenuHoras()); ?>
        <?php echo $form->error($model, 'hora'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->