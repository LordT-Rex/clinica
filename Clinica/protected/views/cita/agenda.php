<h1>Agenda</h1>
<?php $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
    //'themeCssFile'=>'cupertino/jquery-ui.min.css',
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next,today',
            'center'=>'title',
            'right'=>'month,agendaWeek,agendaDay',
            
        ),
        'lang'=>'es',
        //'slotMinutes'=>45,
        //'slotDuration'=>45,
        'snapDuration'=>'00:20:00',
        //'slotMinutes'=> '00:20:00',
        //'slotDuration'=> '00:20:00',
        'minTime'=> '09:00:00',
        'maxTime'=>'21:00:00',
        'selectable'=> true,
        'selectHelper'=> true,
        'editable'=>false,
        'defaultView'=> 'agendaWeek',
        
        'events'=>$this->createUrl('calendar'),
        'monthNamesShort'=>array('Enero' , 'Febrero' , 'Marzo' , 'Abril' , 'Mayo' , 'Junio' , 'Julio' ,'Agosto' , 'Septiembre' , 'Octubre' , 'Noviembre' , 'Diciembre' ),
        'monthNames'=>array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ), 
        'monthNamesShort'=>array( 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiempre','Octubre','Noviembre','Diciembre'),
        'dayNames'=>array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
        'dayNamesShort'=>array('Dom','Lun','Mar','Mie','Jue','Vie','Sab'),
                'buttonText'=>array(
                    'today'=> 'hoy',
               'month'=> 'mes',
               'week'=> 'semana',
               'day'=> 'día'),
               
        
        //'events'=>$this->createUrl('latihan/training/calendarEvents'), // URL to get event
    )));
?>