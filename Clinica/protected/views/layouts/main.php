<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <?php echo Yii::app()->bootstrap->init(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div id="wrapper" id="page">
            <div id="header">
                <?php
                //if (Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente') {
                echo "<div id='marca'>
             <a href='index.php?r=site/index'><img src ='slider/marca.jpg' /></a>
        </div>";
                //}
                ?>

                <div id="sesion"></div>
                <?php
                if (Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente') {
                    echo '<div id="menu1">'
                    ?>


                    <?php
                    $this->widget('bootstrap.widgets.TbNavbar', array(
                        //'brandLabel' => '<img src ="' . Yii::app()->request->baseUrl . '/slider/marca.jpg" />',
                        'display' => null, // default is static to top                    
                        'items' => array(
                            array('class' => 'bootstrap.widgets.TbNav',
                                'items' => array(
                                    array('label' => 'Quienes Somos', 'url' => array('/site/page', 'view' => 'about'), 'visible' => Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente'),
                                    array('label' => 'Nuestros servicios', 'url' => array('/site/page', 'view' => 'servicios'), 'visible' => Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente'),
                                    array('label' => 'Usuarios', 'url' => array('/Usuario/index'), 'visible' => Yii::app()->user->name == 'Dentista'),
                                    array('label' => 'Foro', 'url' => array('/Foro/index'), 'visible' => Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente'),
                                    array('label' => 'Foro', 'url' => array('/Foro/admin'), 'visible' => Yii::app()->user->name == 'Dentista'),
                                    array('label' => 'Pacientes', 'url' => array('/Paciente/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                    array('label' => 'Reportes', 'items' => array(
                                            array('label' => 'Reporte 1', 'url' => array('/Atencion/viewReporte'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                        ),),
                                    array('label' => 'Tratamientos', 'url' => array('/Tratamiento/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                    array('label' => 'Agenda', 'items' => array(
                                            array('label' => 'Agenda', 'url' => array('/Cita/agenda'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                            array('label' => 'Dia', 'url' => array('/Dia/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                            array('label' => 'Bloque', 'url' => array('/Bloque/bloquearPorDia'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                        ),),
                                    array('label' => 'Citas', 'url' => array('/Cita/admin'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                    array('label' => 'Ingresar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                    array('label' => 'Salir', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                ),
                            ),
                        ),
                    ));
                    ?>
                    <?php
                    echo '</div>';
                } else {
                    echo '<div id="menuUsuarios">';
                    $this->widget('bootstrap.widgets.TbNavbar', array(
                        //'brandLabel' => '<img src ="' . Yii::app()->request->baseUrl . '/slider/marca.jpg" />',
                        'display' => null, // default is static to top                    
                        'items' => array(
                            array('class' => 'bootstrap.widgets.TbNav',
                                'items' => array(
                                    //array('label' => 'Quienes Somos', 'url' => array('/site/page', 'view' => 'about')),
                                    //array('label' => 'Nuestros servicios', 'url' => array('/site/page', 'view' => 'servicios'), 'visible' => Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente'),
                                    array('label' => 'Mantenedores', 'items' => array(
                                            array('label' => 'Usuarios', 'url' => array('/Usuario/index'), 'visible' => Yii::app()->user->name == 'Dentista'),
                                            array('label' => 'Tratamientos', 'url' => array('/Tratamiento/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                        ),),
                                    //array('label' => 'Foro', 'url' => array('/Foro/index'), 'visible' => Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente'),
                                    array('label' => 'Foro', 'url' => array('/Foro/admin'), 'visible' => Yii::app()->user->name == 'Dentista'),
                                    array('label' => 'Pacientes', 'url' => array('/Paciente/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                    array('label' => 'Reportes', 'items' => array(
                                            array('label' => 'Reporte 1', 'url' => array('/Atencion/viewReporte'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                        ),),
                                    array('label' => 'Agenda', 'items' => array(
                                            array('label' => 'Agenda', 'url' => array('/Cita/agenda'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                            array('label' => 'Dia', 'url' => array('/Dia/index'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                            array('label' => 'Bloque', 'url' => array('/Bloque/bloquearPorDia'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                        ),),
                                    array('label' => 'Citas', 'url' => array('/Cita/admin'), 'visible' => Yii::app()->user->name == 'Dentista' || Yii::app()->user->name == 'Asistente'),
                                    array('label' => 'Ingresar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                    array('label' => 'Salir', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                ),
                            ),
                        ),
                    ));
                    echo '</div>';
                }
                ?>
                <?php
                if (Yii::app()->user->name != 'Dentista' & Yii::app()->user->name != 'Asistente') {
                    echo '<div id="reservahoraria">
            <a href="index.php?r=Cita/solicitud"><img src ="slider/reservahoraria.png" width="197" height="59"/></a>
        </div>';
                }
                ?>
            </div>




<?php echo $content; ?>
            

            <div id="social">
                Siguenos en nuestras redes sociales
                <a target="_blank" href="https://www.facebook.com/clinicadental.elroble"><img src="slider/fb.png" width="50" height="50" /></a>
                <a target="_blank" href="https://twitter.com/clinica_elroble"><img src="slider/tw.png" width="50" height="50" /></a>
            </div>

            <div id="footer"><span class="pie">Lunes a Viernes de 9:30 a 13:00 hrs. 15:30 a 20:00 hrs. / Sábados 9:00 a 13:00 hrs.</strong>
                    informaciones@clinicadentalelroble.cl - (72) 2 23 25 75 - (72) 2 22 90 31</span><br />
                <span class="creditos"> Copyright &copy; Desarrollado por Jordan Arteaga - Geraldine Bustos</span>
            </div>


        </div><!-- page -->

    </body>
</html>
