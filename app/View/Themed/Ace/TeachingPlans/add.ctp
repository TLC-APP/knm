
<?php echo $this->Html->css('fullcalendar'); ?>
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('amlich-aa98'); ?>
<?php echo $this->Html->script('ngayle'); ?>
<?php echo $this->Html->script('bootbox'); ?>
<?php echo $this->Html->script('fullcalendar.min'); ?>
<?php echo $this->Html->script('vi'); ?>
<?php echo $this->Html->css('/bootstrapvalidator-0.5.2/css/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/language/vi_VN'); ?>


<div class="page-content-area">
    <div class="page-header">
        <h2>
            Đăng ký lịch dạy
        </h2>
        <p>Kế hoạch giảng dạy được lập trước 2 tháng, ví dụ kế hoạch tháng 10 sẽ được lập và chỉnh sửa 1 - 15 tháng 8.</p>
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
        <div class="row bootbox">
            <!-- The login modal. Don't display it initially -->
            <?php
            echo $this->Form->create('TeachingPlan', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
                'class' => 'form-horizontal',
                'id' => 'addplanform',
                'style' => "display: none;"
            ));
            ?>

            <?php
            echo $this->Form->input('session', array('label' => false, 'type' => 'select',
                'options' => array('A' => 'Cả buổi sáng và buổi chiều', 'S' => 'Buổi sáng', 'C' => 'Buổi chiều')));

            echo $this->Form->button('Lưu', array('class' => "btn btn-default", 'id' => 'addButton'));
            echo $this->Form->end();
            ?>



            <script>
                $(document).ready(function () {
                    $('#addplanform')
                            .bootstrapValidator({
                                feedbackIcons: {
                                    valid: 'glyphicon glyphicon-ok',
                                    invalid: 'glyphicon glyphicon-remove',
                                    validating: 'glyphicon glyphicon-refresh'
                                }

                            });
                });

            </script>
        </div>
    </div>
</div>
<!-- /.page-content-area -->
<?php echo $this->Html->script('teaching-plan');?>

