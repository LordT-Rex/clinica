<?php
/* @var $this ForoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Foros',
);

$this->menu=array(
	array('label'=>'Haz tu pregunta', 'url'=>array('pregunta')),
);
?>

<h3>Foros</h3>
<?php  $Foro = new Foro();  ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$Foro->searchRespondidas(),
	'itemView'=>'_view',
)); ?>
<div id="social">
    Siguenos en nuestras redes sociales
    <a target="_blank" href="https://www.facebook.com/clinicadental.elroble"><img src="slider/fb.png" width="50" height="50" /></a>
    <a target="_blank" href="https://twitter.com/clinica_elroble"><img src="slider/tw.png" width="50" height="50" /></a>
</div>
<div id="footer"><span class="pie">Lunes a Viernes de 9:30 a 13:00 hrs. 15:30 a 20:00 hrs. / Sábados 9:00 a 13:00 hrs.</strong>
        informaciones@clinicadentalelroble.cl - (72) 2 23 25 75 - (72) 2 22 90 31</span><br />
    <span class="creditos"> Copyright &copy; Desarrollado por Jordan Arteaga - Geraldine Bustos</span>
</div>
