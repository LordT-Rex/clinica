<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div id="pagina">
    <div id="slider">
        <?php
        $image_url = Yii::app()->baseUrl . '/slider/';
        $image_arr[] = array('image' => $image_url . 'slider1.jpg');
        $image_arr[] = array('image' => $image_url . 'slider2.jpg');
        $image_arr[] = array('image' => $image_url . 'slider3.jpg');
        $image_arr[] = array('image' => $image_url . 'slider4.jpg');
        ?>
        <?php
        $this->widget('application.extensions.wowslider.WowSlider', array(
            'sliderid' => 'wowslider-container1', // required slide unique Id
            'data_arr' => $image_arr, // required data array
            'effect' => 'basic', // optional stack_vertical|basic|blast|blinds|blur|fade|fly|kenburns|rotate|slices|squares|stack
            'duration' => 2000, // optional in milisecond (default 2000)
            'delay' => 2000, // optional in milisecond (default 2000)
            'width' => 100, // optional (default 960)
            'height' => 50, // optional (default 360)
            'autoPlay' => true, // optional true|false (default true)
            'stopOnHover' => false, // optional true|false (default false)
            'loop' => false, // optional true|false (default false)
            'bullets' => true, // optional true|false (default true)
            'caption' => true, // optional true|false (default true)
            'controls' => true, // optional true|false (default true)
            'loading' => '', // optional loading image url (default /images/loader.gif)
        ));
        ?>
    </div>
    <div id="columna1">
        <div id="noticia">
            <div id="foto"><img src="slider/foto.png" width="150" height="150" /></div>
            <div id="texto"><span class="titulos"><em>Nuestros servicios </em></span><br />
                Conoce nuestra variada gama de servicios que ofrecemos para ti. Haz click en Ver más </div>
            <div id="vermas"><a href="noticia.html">Ver Más</a></div>
        </div>

        <div id="noticia">
            <div id="foto"><img src="slider/people.png" width="150" height="150" /></div>
            <div id="texto"><em><span class="titulos">Quiénes somos </span></em><br />
                Conoce más sobre nosotros y sobre la Clínica Dental "El Roble". Haz click en Ver más</div>
            <div id="vermas"><a href="index.php?r=site/page&view=about">Ver Más</a></div>
        </div>

    </div>


    <div id="columna">
        <div id="noticia">
            <div id="foto"><img src="slider/mapa.png" width="150" height="150" /></div>
            <div id="texto"><em><span class="titulos">Encuéntranos <br />
                    </span></em>
                Conoce donde nos encontramos atendiendo. Haz click en Ver Más </div>
            <div id="vermas"><a href="index.php?r=site/contact">Ver Más</a></div>
        </div>

        <div id="noticia">
            <div id="foto"><img src="slider/calendario.png" width="150" height="150" /></div>
            <div id="texto"><em><span class="titulos">Reserva tu cita </span></em><br />
                Podrás reservar tu próxima cita directo desde nuestra página web de forma sencilla y rápida. Haz click en Ver más </div>
            <div id="vermas"><a href="noticia.html">Ver Más</a></div>
        </div>
    </div>
</div>
<div id="social">
    Siguenos en nuestras redes sociales
    <a target="_blank" href="https://www.facebook.com/clinicadental.elroble"><img src="slider/fb.png" width="50" height="50" /></a>
    <a target="_blank" href="https://twitter.com/clinica_elroble"><img src="slider/tw.png" width="50" height="50" /></a>
</div>

<div id="footer"><span class="pie">Lunes a Viernes de 9:30 a 13:00 hrs. 15:30 a 20:00 hrs. / Sábados 9:00 a 13:00 hrs.</strong>
        informaciones@clinicadentalelroble.cl - (72) 2 23 25 75 - (72) 2 22 90 31</span><br />
    <span class="creditos"> Copyright &copy; Desarrollado por Jordan Arteaga - Geraldine Bustos</span>
</div>

