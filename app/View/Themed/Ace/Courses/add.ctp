<?php echo $this->Html->css('fullcalendar'); ?>
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('bootbox'); ?>
<?php echo $this->Html->script('fullcalendar.min'); ?>
<?php echo $this->Html->script('vi'); ?>
<?php echo $this->Html->css('/bootstrapvalidator-0.5.2/css/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/language/vi_VN'); ?>


<div class="page-content-area">
    <div class="page-header">
        <h1>
            Full Calendar
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                with draggable and editable events
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-10">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-sm-10">
                    <div class="space"></div>

                    <div id="calendar">
                    </div>


                </div>

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <!-- The login modal. Don't display it initially -->
            <?php
            echo $this->Form->create('Course', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
                'class' => 'form-horizontal well',
                'id' => 'addcourseform',
                'style' => "display: none;"
            ));
            echo $this->Form->input('chapter_id', array('label' => 'Kỹ năng'));
            echo $this->Form->input('period', array('label' => 'Buổi', 'type' => 'select',
                'options' => array('S' => 'Sáng', 'C' => 'Chiều', 'T' => 'Tối')));

            echo $this->Form->input('name', array('name' => 'name', 'label' => 'Tên lớp', 'placeholder' => '1 hoặc 2 hoặc 3...'));

            echo $this->Form->input('addnextperiod', array('type' => 'select', 'label' => 'Thêm buổi 2 cách 1 tuần', 'options' => array('Y' => 'Có', 'N' => 'Không')));
            echo $this->Form->input('Period.room_id', array('label' => 'Phòng'));
            echo $this->Form->button('Lưu', array('class' => "btn btn-default"));
            echo $this->Form->end();
            ?>



            <script>
                $(document).ready(function() {
                    $('#addcourseform')
                            .bootstrapValidator({
                                feedbackIcons: {
                                    valid: 'glyphicon glyphicon-ok',
                                    invalid: 'glyphicon glyphicon-remove',
                                    validating: 'glyphicon glyphicon-refresh'
                                },
                                fields: {
                                    name: {
                                        validators: {
                                            notEmpty: {
                                                message: 'Bạn phải nhập tên lớp'
                                            }
                                        }
                                    }
                                }
                            });

                    // Login button click handler
                    $('#loginButton').on('click', function() {

                    });
                });

            </script>
        </div>
    </div>
</div>
<!-- /.page-content-area -->
<script type="text/javascript">
    jQuery(function($) {

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });




        /* initialize the calendar
         -----------------------------------------------------------------*/

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            dayRender: function(date, cell) {
                
                var today = moment();
                var end = moment().add(7, 'days');

                if (moment(date.format('YYYY-MM-DD')).isSame(today.format('YYYY-MM-DD'))) {
                    
                    cell.css("background-color", "red");
                }

                var start = moment().add(1, 'days');

                while (start.isBefore(end.format('YYYY-MM-DD'))) {
                    //console.log(start);
                    //alert(start + "\n" + tomorrow);
                    if (moment(date.format('YYYY-MM-DD')).isSame(start.format('YYYY-MM-DD'))) {
                        cell.css("background-color", "yellow");
                    }

                    var newDate = start.add(1, 'days');
                    start = newDate;
                }
            }
            ,
            buttonHtml: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            }
            ,
            header: {left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                var $extraEventClass = $(this).attr('data-class');


                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                if ($extraEventClass)
                    copiedEventObject['className'] = [$extraEventClass];

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
            ,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                bootbox
                        .dialog({
                            title: 'Thêm buổi học',
                            message: $('#addcourseform'),
                            show: false // We will show it manually later
                        })
                        .on('shown.bs.modal', function() {
                            $('#addcourseform')
                                    .show()                                 // Show the login form
                                    .bootstrapValidator('resetForm', true); // Reset form
                        })
                        .on('hide.bs.modal', function(e) {
                            // Bootbox will remove the modal (including the body which contains the login form)
                            // after hiding the modal
                            // Therefor, we need to backup the form
                            $('#addcourseform').hide().appendTo('body');
                        }).on('success.form.bv', function(e) {
                    // Prevent form submission
                    e.preventDefault();

                    var $form = $(e.target), // The form instance
                            bv = $form.data('bootstrapValidator');   // BootstrapValidator instance

                    // Use Ajax to submit form data

                    var stDate = moment(start).format('YYYY-MM-DD');
                    $.post($form.attr('action'), $form.serialize() + '&start=' + stDate, function(result) {
                        // ... Process the result ...

                        // Hide the modal containing the form
                        $form.parents('.bootbox').modal('hide');
                    }, 'json');
                })
                        .modal('show');
                /*bootbox.prompt("New Event Title:", function(title) {
                 if (title !== null) {
                 calendar.fullCalendar('renderEvent',
                 {
                 title: title,
                 start: start,
                 end: end,
                 allDay: allDay
                 },
                 true // make the event "stick"
                 );
                 }
                 });*/


                calendar.fullCalendar('unselect');
            }
            ,
            eventClick: function(calEvent, jsEvent, view) {

                //display a modal
                var modal =
                        '<div class="modal fade">\
                <div class="modal-dialog">\
                           <div class="modal-content">\
                    <div class="modal-body">\
                <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
                <form class="no-margin">\
                <label>Change event name &nbsp;</label>\
                <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
    <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
                                   </form>\
                                 </div>\
                                 <div class="modal-footer">\
                                        <button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
                                        <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                                 </div>\
                          </div>\
                         </div>\
                        </div>';


                var modal = $(modal).appendTo('body');
                modal.find('form').on('submit', function(ev) {
                    ev.preventDefault();

                    calEvent.title = $(this).find("input[type=text]").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    modal.modal("hide");
                });
                modal.find('button[data-action=delete]').on('click', function() {
                    calendar.fullCalendar('removeEvents', function(ev) {
                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });

                modal.modal('show').on('hidden', function() {
                    modal.remove();
                });


                //console.log(calEvent.id);
                //console.log(jsEvent);
                //console.log(view);

                // change the border color just for fun
                //$(this).css('border-color', 'red');

            }

        });

        $('#calendar').fullCalendar('next');
    });
</script>

