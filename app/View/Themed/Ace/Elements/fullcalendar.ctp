<?php
echo $this->Html->css('/fullcalendar/fullcalendar',array('inline'=>false));
//echo $this->Html->css('/fullcalendar/fullcalendar-bootstrap',array('inline'=>false));
echo $this->Html->css('/fullcalendar/fullcalendar.print',array('inline'=>false));
echo $this->Html->script('/fullcalendar/lib/moment.min',array('inline'=>false));
echo $this->Html->script('/fullcalendar/fullcalendar.min',array('inline'=>false));
echo $this->Html->script('/fullcalendar/lang/vi',array('inline'=>false));
?>