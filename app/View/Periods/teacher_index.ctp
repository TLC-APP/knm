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




<div id="context-menu2" style="position: absolute; top: 964px; left: 418px;" class="">
    <ul class="dropdown-menu" role="menu">
        <li><a tabindex="-1">In lớp</a></li>
    </ul>
</div>
<div class="page-content-area">
    <div class="row">
        <div class="col-md-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-8">    
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
        var periodSource = '/knm/periods/teacherIndex' + "?chapter_id=" + $("#CourseFilterChapterId").val();
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
                                window.open("/knm/courses/course_pdf_export/"+event.course_id);
                            }
                        });
                        $(element).find(".fc-time").remove();
                        var content = event.chapter_name + "<br/> Mã lớp <b>" + event.malop + "</b><br/>" + event.name + ' tại ' + event.room_name;
                        content += "<br/> Đã đăng ký " + event.enrolledno;
                        element.qtip({
                            content: content
                        });
                    },
                    eventAfterAllRender: function (view) {
                        var allEvents = $('#period').fullCalendar('clientEvents');
                        $("#periodno").html('Có tất cả ' + allEvents.length + ' buổi');
                    }

                }
        );

        /*Xử lý các filter*/

        /*CourseFilter*/
        function reloadPeriodEvents() {
            var newPeriodSource = '/knm/periods/teacherIndex' + "?chapter_id=" + $("#CourseFilterChapterId").val();
            $('#period').fullCalendar('removeEventSource', periodSource);
            $('#period').fullCalendar('refetchEvents');
            $('#period').fullCalendar('addEventSource', newPeriodSource);
            //$('#calendar').fullCalendar('refetchEvents');
            periodSource = newPeriodSource;
        }
        /*Thay doi giang vien */

        /*Thay doi chapter */
        $("#CourseFilterChapterId").on("change", function () {
            reloadPeriodEvents();
        });
        /*Hết đoạn xử lý filter*/
        //$('#period').fullCalendar('next');

    });
</script>

