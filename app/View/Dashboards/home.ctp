<?php echo $this->element('fullcalendar'); ?>
<div class="page-wrapper">

    <div class="page-content">
        <div class="row page-row">
            <div class="events-wrapper col-md-8 col-sm-7">

                <?php //echo $this->element('Widgets/guest/slide_show')?>
                <div id="calendar">

                </div>
                <script>
                    $(document).ready(function() {

                        // page is now ready, initialize the calendar...

                        $('#calendar').fullCalendar({
                            // put your options and callbacks here
                            //height: 500,
                            //lang: 'vi'
                        });

                    });
                </script>
            </div><!--//events-wrapper-->
            <aside class="page-sidebar  col-md-4 col-sm-4 ">
                <?php echo $this->element('Widgets/guest/thong_bao') ?>
            </aside>
        </div><!--//page-row-->
        <div class="row page-row">
            <?php //echo $this->element('Widgets/guest/uncompleted_courses') ?>
        </div>
        <div class="row page-row">
            <?php //echo $this->element('Widgets/guest/completed_courses') ?>
        </div>
    </div><!--//page-content-->
</div>
