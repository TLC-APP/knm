<?php echo $this->Html->css('fullcalendar'); ?>
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('bootbox'); ?>
<?php echo $this->Html->script('fullcalendar.min'); ?>
<?php echo $this->Html->script('jquery.qtip.min'); ?>
<?php echo $this->Html->css('jquery.qtip.min'); ?>
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('select2-bootstrap'); ?>
<?php echo $this->Html->script('select2.min'); ?>
<?php echo $this->Html->script('vi'); ?>
<?php echo $this->Html->script('bootstrap-contextmenu'); ?>
<?php echo $this->Html->css('/bootstrapvalidator-0.5.2/css/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/language/vi_VN'); ?>

<div id="context-menu2" style="position: absolute; top: 964px; left: 418px;" class="">
    <ul class="dropdown-menu" role="menu">
        <li><a tabindex="-1">Mở</a></li>
        <li><a tabindex="-1">Hủy</a></li>
        <li><a tabindex="-1">In danh sách SV</a></li>
        <li><a tabindex="-1">Nhập điểm</a></li>

    </ul>
</div>
<div class="page-content-area">
    <div class="row">
        <div class="col-md-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                    <div class="space"></div>
                    <div class="widget-box widget-color-dark ui-sortable-handle">
                        <div class="widget-header">
                            <h5 class="widget-title bigger lighter">Kế hoạch được đăng ký</h5>
                            <div class="widget-toolbar">
                                <span class="badge badge-primary">Sáng</span>
                                <span class="badge badge-warning">Chiều</span>
                                <span class="badge btn-light">Đã phân công</span>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-toolbox">
                                <?php
                                echo $this->Form->create('TeachingPlanFilter', array('inputDefaults' => array(
                                        'div' => 'form-group',
                                        'label' => array(
                                            'class' => 'col col-sm-3 control-label'
                                        ),
                                        //'wrapInput' => 'col col-sm-7',
                                        'class' => 'form-control'
                                    ), 'class' => 'form-inline'));
                                echo $this->Form->input('session', array('label' => false, 'empty' => 'Cả 2 buổi', 'options' => array('S' => 'Sáng', 'C' => 'Chiều')));
                                echo $this->Form->input('teacher_id', array('label' => false, 'empty' => 'Tất cả giảng viên'));
                                echo $this->Form->end();
                                ?>
                            </div>
                            <div class="widget-main padding-16">
                                <div id="calendar">
                                </div>
                            </div>
                        </div>
                        <div class="widget-toolbox padding-8 clearfix">
                            <span id="teachingplanno"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">    
                    <div class="space"></div>
                    <div class="widget-box widget-color-dark ui-sortable-handle">
                        <div class="widget-header">
                            <h5 class="widget-title bigger lighter">Danh sách các lớp kỹ năng</h5>
                            <div class="widget-toolbar">
                                <span class="badge badge-theme">Chờ hủy</span>
                                <span class="badge badge-danger">Đã hủy</span>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-toolbox">
                                <?php
                                echo $this->Form->create('CourseFilter', array('inputDefaults' => array(
                                        'div' => 'form-group',
                                        'label' => array(
                                            'class' => 'col col-sm-3 control-label'
                                        ),
                                        //'wrapInput' => 'col col-sm-7',
                                        'class' => 'form-control'
                                    ), 'class' => 'form-inline'));
                                echo $this->Form->input('trang_thai', array('label' => false, 'empty' => 'Trạng thái lớp', 'options' => array(
                                        COURSE_ENROLLING => 'Đang đăng ký',
                                        COURSE_OPENABLE => 'Đủ điều kiện mở',
                                        COURSE_OPEN => 'Đã mở',
                                        COURSE_WAIT_CANCEL => 'Chờ hủy',
                                        COURSE_CANCELLED => 'Đã hủy'
                                )));
                                echo $this->Form->input('teacher_id', array('label' => false, 'empty' => 'Tất cả giảng viên'));
                                echo $this->Form->input('chapter_id', array('label' => false, 'empty' => 'Tất cả chuyên đề'));

                                echo $this->Form->end();
                                ?>
                            </div>
                        </div>
                        <div class="widget-main padding-16">
                            <div id="period">
                            </div>
                        </div>
                        <div class="widget-toolbox padding-8 clearfix">
                            <div class="col-md-8">
                                <form class="form-search" id="search_period_form">
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="input-group">
                                            <input type="text" id="search_course_name" class="form-control search-query" name="course_name" placeholder="Mã lớp cần tìm">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-purple btn-sm">
                                                    Tìm
                                                    <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4" id="periodno"></div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<!-- /.page-content-area -->
<script type="text/javascript">

    jQuery(function ($) {
        /*Xử lý tìm kiếm buổi học*/
        var search_period_form = $("#search_period_form");
        search_period_form.on("submit", function (event) {

            event.preventDefault();
            var course_name = $("#search_course_name").val();
            $.ajax({
                type: "post",
                url: "/knm/periods/searchByCourseName?course_name=" + course_name,
                dataType: 'json',
                success: function (data) {
                    if (!data.isFound) {
                        bootbox.alert('Không tìm thấy lớp ' + course_name);
                    } else {

                        $('#period').fullCalendar('gotoDate', moment(data.date));

                        $("[data-date='" + moment(data.date).format('YYYY-MM-DD') + "']").addClass("fc-state-highlight");
                    }
                }


            });

        });
        var periodSource = '/knm/periods/managerIndex?teacher_id=' + $("#CourseFilterTeacherId").val() + "&chapter_id=" + $("#CourseFilterChapterId").val() + "&trang_thai=" + $("#CourseFilterTrangThai").val();
        var period = $('#period').fullCalendar(
                {
                    events: {
                        url: periodSource,
                        cache: true
                    },
                    eventRender: function (event, element) {
                        /*Context menu*/
                        element.contextmenu({
                            target: '#context-menu2',
                            onItem: function (context, e) {
                                console.log(e);
                                alert($(e.target).text());
                            }
                        });



                        $(element).find(".fc-time").remove();
                        var content = event.chapter_name + "<br/> Mã lớp <b>" + event.malop + "</b><br/>" + event.name + ' tại ' + event.room_name + ' <br/>Dạy bởi ' + event.teacher_name;
                        content += "<br/> Đã đăng ký " + event.enrolledno;
                        element.qtip({
                            content: content
                        });
                    },
                    eventAfterAllRender: function (view) {
                        var allEvents = $('#period').fullCalendar('clientEvents');
                        $("#periodno").html('Có tất cả ' + allEvents.length + ' buổi');
                    },
                    eventClick: function (calEvent, jsEvent, view) {
                        bootbox.confirm("Bạn chắc xóa lớp" + calEvent.title + ' không ? Lưu ý: Nếu xóa thì cả 2 buổi học thuộc lớp cũng bị xóa theo.', function (result) {
                            if (result) {
                                $.post("/knm/courses/ajax_delete/" + calEvent.course_id, function (result) {
                                    if (!result.success) {
                                        bootbox.alert(result.message);
                                    } else {                                     // ... Process the result ...
                                        //$('#calendar').fullCalendar('removeEvents', calEvent.id);
                                        $('#calendar').fullCalendar('refetchEvents');
                                        $('#period').fullCalendar('refetchEvents');
// Hide the modal containing the form
                                    }

                                }, 'json');
                            } else {                             //alert('Thôi');
                            }
                        });
                    }
                }
        );
        var session = $("#TeachingPlanFilterSession").val();
        var teacher_id = $("#TeachingPlanFilterTeacherId").val();
        var teachingPlanSource = '/knm/teaching_plans/managerindex?session=' + session + '&teacher_id=' + teacher_id;
        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            events: {
                url: teachingPlanSource,
                cache: true
            },
            eventRender: function (event, element) {
                $(element).find(".fc-time").remove();
                element.qtip({
                    content: event.teacher_name
                });
            },
            eventAfterAllRender: function (view) {
                var allEvents = $('#calendar').fullCalendar('clientEvents');
                $("#teachingplanno").html('Có tất cả ' + allEvents.length + ' buổi');
            },
            eventClick: function (calEvent, jsEvent, view) {
                if (calEvent.name == 2) {
                    var lastweek = moment(calEvent.start);
                    lastweek.add(-7, "days");
                    bootbox.alert("Bạn phải chọn buổi 1 " + calEvent.session_name + " ngày " + lastweek.format('DD/MM/YYYY'));
                    return false;
                }
                if (calEvent.created) {

                    bootbox.alert("Đã tạo lớp cho kế hoạch này");
                    return false;
                }
                Pace.track(function () {
                    jQuery.ajax(
                            {
                                type: 'POST',
                                url: '/knm/courses/managerAddCourseForm/' + calEvent.teacher_id,
                                data: {
                                    start: calEvent.start.format('YYYY-MM-DD H:m:s'),
                                    session: calEvent.session
                                },
                                success: function (data) {
                                    bootbox
                                            .dialog({
                                                title: 'Thêm lớp kỹ năng buổi ' + calEvent.title + ' ngày ' + calEvent.start.format('DD/MM/YYYY'),
                                                message: data,
                                                buttons: [
                                                    {
                                                        label: "Thực hiện",
                                                        className: "btn btn-primary pull-left",
                                                        callback: function () {
                                                            var form = $("#managerAddCourseForm");
                                                            /*Gui data de luu lai*/
                                                            Pace.track(function () {
                                                                jQuery.ajax({
                                                                    url: '/knm/courses/managerAddCourse', // URL to the local file
                                                                    type: 'POST', // POST or GET
                                                                    data: form.serialize(), // Data to pass along with your request
                                                                    success: function (data, status) {
                                                                        calendar.fullCalendar('refetchEvents');
                                                                        period.fullCalendar('refetchEvents');
                                                                        form.parents('.bootbox').modal('hide');

                                                                    }
                                                                });
                                                            });



                                                            /* 
                                                             This part you have to complete yourself :D
                                                             
                                                             if (your_form_validation(items)) {
                                                             // Make your data save as async and then just call modal.modal("hide");
                                                             } else {
                                                             // Show some errors, etc on form
                                                             }
                                                             */

                                                            return false;
                                                        }
                                                    },
                                                    {
                                                        label: "Đóng",
                                                        className: "btn btn-default pull-left",
                                                        callback: function () {
                                                            //Xử lý khi click nut đóng
                                                        }
                                                    }],
                                                show: false // We will show it manually later
                                            }).modal('show');
                                }});
                });
            }

        });

        /*Xử lý các filter*/
        /*TeachingPlanFilter*/
        function reloadTeachingPlan() {
            var newTeachingPlanSource = '/knm/teaching_plans/managerindex?session=' + $("#TeachingPlanFilterSession").val() + '&teacher_id=' + $("#TeachingPlanFilterTeacherId").val();
            $('#calendar').fullCalendar('removeEventSource', teachingPlanSource);
            $('#calendar').fullCalendar('refetchEvents');
            $('#calendar').fullCalendar('addEventSource', newTeachingPlanSource);
            //$('#calendar').fullCalendar('refetchEvents');
            teachingPlanSource = newTeachingPlanSource;
        }

        /*Buổi*/
        $("#TeachingPlanFilterSession").on("change", function () {
            reloadTeachingPlan();
        });
        /*Giảng viên*/
        $("#TeachingPlanFilterTeacherId").on("change", function () {
            reloadTeachingPlan();
        });

        /*CourseFilter*/
        function reloadPeriodEvents() {
            var newPeriodSource = '/knm/periods/managerIndex?teacher_id=' + $("#CourseFilterTeacherId").val() + "&chapter_id=" + $("#CourseFilterChapterId").val() + "&trang_thai=" + $("#CourseFilterTrangThai").val();
            $('#period').fullCalendar('removeEventSource', periodSource);
            $('#period').fullCalendar('refetchEvents');
            $('#period').fullCalendar('addEventSource', newPeriodSource);
            //$('#calendar').fullCalendar('refetchEvents');
            periodSource = newPeriodSource;
        }
        /*Thay doi giang vien */
        $("#CourseFilterTeacherId").on("change", function () {
            reloadPeriodEvents();
        });
        $("#CourseFilterTrangThai").on("change", function () {
            reloadPeriodEvents();
        });
        /*Thay doi chapter */
        $("#CourseFilterChapterId").on("change", function () {
            reloadPeriodEvents();
        });
        /*Hết đoạn xử lý filter*/
        $('#calendar').fullCalendar('next');
        $('#period').fullCalendar('next');

    });
</script>

