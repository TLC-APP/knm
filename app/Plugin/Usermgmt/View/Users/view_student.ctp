<!-- PAGE CONTENT BEGINS -->
<?php echo $this->Html->script('bootbox'); ?>
<?php echo $this->Html->css('/bootstrapvalidator-0.5.2/css/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/bootstrapValidator.min'); ?>
<?php echo $this->Html->script('/bootstrapvalidator-0.5.2/js/language/vi_VN'); ?>
<?php echo $this->Html->script('search_student'); ?>
<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-3 center">
        <div>
            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="<?php echo $student['User']['name'] ?>" src="<?php echo SUB_DIR ?>/img/<?php echo ($student['User']['sex']) . '.jpg' ?>" style="display: block;"></img>

            </span>

            <div class="space-4"></div>
            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php echo $student['User']['name'] ?></span>
                    </a>

                    <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                        <li class="dropdown-header"> Change Status </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle green"></i>
                                &nbsp;
                                <span class="green">Available</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle red"></i>
                                &nbsp;
                                <span class="red">Busy</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-circle grey"></i>
                                &nbsp;
                                <span class="grey">Invisible</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="space-6"></div>
        <?php if ($this->UserAuth->getGroupId() == 'admin'): ?>
            <div class="profile-contact-info">
                <div class="profile-contact-links align-left">

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                        Add as a friend
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                        Send a message
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                        www.alexdoe.com
                    </a>
                </div>
                <div class="space-6"></div>
            </div>

        <?php endif; ?>

        <div class="hr hr16 dotted"></div>
    </div>

    <div class="col-xs-12 col-sm-9">


        <div class="space-12"></div>

        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> MSSV </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $student['User']['username'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Lớp </div>

                <div class="profile-info-value">

                    <span class="editable editable-click" id="lop"><?php echo $student['Classroom']['code'] ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Khoa </div>

                <div class="profile-info-value">

                    <span class="editable editable-click" id="lop"><?php echo $student['Classroom']['Department']['name'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Ngày sinh </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $student['User']['borndate'] ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Nơi sinh </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $student['Province']['name'] ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Email </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $student['User']['email'] ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Số điện thoại </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $student['User']['phone'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Ngày tham gia </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="signup"><?php echo $student['User']['created'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Lần đăng nhập cuối </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="login" style="display: inline;"><?php echo $student['User']['last_login'] ?></span>
                </div>
            </div>

        </div>

        <div class="space-20"></div>


        <div class="hr hr2 hr-double"></div>

        <div class="space-6"></div>

        <div class="center">
            <?php echo $this->Html->link('<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                <i class="icon-on-right ace-icon fa fa-edit"></i>
                <span class="bigger-110">Cập nhật</span>
            </button>', array('action' => 'editUser', $student['User']['id']), array('escape' => false)); ?>
            <?php echo $this->Html->link('Đổi mật khẩu', array('action' => 'changeUserPassword', $student['User']['id']), array('escape' => false)); ?>

        </div>
    </div>
</div>
<div class="row">
    <h2>Các kỹ năng đã tham dự</h2>
    <table class="table table-condensed table-hover">
        <thead>
        <th>Kỹ năng</th>
        <th>Mã lớp</th>
        <th>Tình trạng lớp</th>
        <th>Ngày đăng ký</th>
        <th>Kết quả</th>
        <th>Học phí</th>
        <th>Số biên lai</th>
        <th>Vắng</th>
        <th>Lý do vắng</th>
        </thead>
        <tbody>
            <?php foreach ($student['Enrollment'] as $enroll) : ?>

                <tr>
                    <td><?php echo $enroll['Course']['Chapter']['name'] ?></td>
                    <td><?php echo $enroll['Course']['name'] ?></td>

                    <td>                        
                        <?php echo $this->element('course_status', array('status' => $enroll['Course']['trang_thai'])); ?>
                    </td>
                    <td><?php echo $enroll['created']; ?></td>

                    <td><?php
                        if (is_null($enroll['pass'])) {
                            $pass = "Chưa cập nhật";
                        } else {
                            if (($enroll['pass'])) {
                                $pass = "<i class='fa fa-check text-success'></i>";
                            } else {
                                $pass = "<i class='fa fa-times text-danger'></i>";
                            }
                        }
                        echo $pass;
                        ?></td>
                    <td id="dong_hoc_phi_td_<?php echo $enroll['id'] ?>"><?php
                        $fee = "";
                        if (!is_null($enroll['pass']) && !$enroll['pass']) {
                            if ($enroll['fee']) {
                                $fee = $this->Html->link("<i class='fa fa-check text-success'></i>", array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'huy_dong_hoc_phi', 'rel' => $enroll['id'], $enroll['id']), array('class' => 'huy_dong_hoc_phi_btn', 'escape' => false));
                                ;
                            } else {
                                $fee = $this->Html->link("<i class='fa fa-times text-danger'></i>", array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'dong_hoc_phi', $enroll['id']), array('class' => 'dong_hoc_phi_btn', 'escape' => false));
                            }
                            echo $fee;
                        }
                        ?></td>
                    <td id="bienlai_td_<?php echo $enroll['id'] ?>"><?php echo ($enroll['fee_paper_no']) ?></td>

                    <td id="vang_<?php echo $enroll['id']; ?>"><?php
                        $vang = "";

                        if ($enroll['absence']) {
                            $vang = $this->Html->link("<i class='fa fa-check text-success'></i>", array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'huy_vang', $enroll['id']), array('class' => 'huy_vang_btn', 'escape' => false));
                        } else {
                            $vang = $this->Html->link("<i class='fa fa-times text-danger'></i>", array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'vang', $enroll['id']), array('class' => 'vang_btn', 'escape' => false));
                        }
                        echo $vang;
                        ?>
                    </td>
                    <td id="ly_do_vang_<?php echo $enroll['id']; ?>"><?php echo $enroll['absence_reason']; ?></td>

                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="bootbox modal">
        <!-- The login modal. Don't display it initially -->
        <?php
        echo $this->Form->create('Enrollment', array(
            //'url' => array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'dong_hoc_phi'),
            'inputDefaults' => array(
                'div' => 'form-group',
                'wrapInput' => false,
                'class' => 'form-control'
            ),
            'class' => 'form-horizontal',
            'id' => 'hocphiform',
                //'style' => 'display:none;'
        ));
        ?>
        <?php
        //echo $this->Form->input('id', array('type' => 'hidden', 'value' => $enroll['id']));
        echo $this->Form->input('fee_paper_no', array('label' => 'Số biên lai'));
        //echo $this->Form->button('Thực hiện', array('type' => 'button', 'class' => "btn btn-sm", 'id' => 'addButton'));
        echo $this->Form->end();
        ?>
    </div>

    <div class="bootbox modal">
        <!-- The login modal. Don't display it initially -->
        <?php
        echo $this->Form->create('Enrollment', array(
            //'url' => array('plugin' => false, 'manager' => true, 'controller' => 'enrollments', 'action' => 'dong_hoc_phi'),
            'inputDefaults' => array(
                'div' => 'form-group',
                'wrapInput' => false,
                'class' => 'form-control'
            ),
            'class' => 'form-horizontal',
            'id' => 'vangform',
                //'style' => 'display:none;'
        ));
        ?>
        <?php
        //echo $this->Form->input('id', array('type' => 'hidden', 'value' => $enroll['id']));
        echo $this->Form->input('absence_reason', array('label' => 'Lý do vắng', 'placeholder' => 'Về quê (Buổi 1...)'));
        //echo $this->Form->button('Thực hiện', array('type' => 'button', 'class' => "btn btn-sm", 'id' => 'addButton'));
        echo $this->Form->end();
        ?>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        //Xử lý lúc clich nút đóng học phí
        $(document).on("click", "a.dong_hoc_phi_btn", function(e) {
            var _this = this;
            e.preventDefault();
            bootbox.dialog({
                //title: 'Số biên lai?',
                message: $('#hocphiform'),
                //show: false, // We will show it manually later
                buttons: {
                    success: {
                        label: "Thực hiện!",
                        className: "btn-success",
                        callback: function() {
                            e.preventDefault();
                            var $form = $('#hocphiform'), // The form instance
                                    bv = $form.data('bootstrapValidator');   // BootstrapValidator instance

                            $.post($(_this).attr('href'), $form.serialize(), function(result) {
                                if (!result.success) {
                                    bootbox.alert(result.message);
                                } else {                                 // ... Process the result ...
                                    //bootbox.alert(result.sobienlai);
                                    // Hide the modal containing the form
                                    var td = $("#dong_hoc_phi_td_" + result.id);
                                    var bienlai_td = $("#bienlai_td_" + result.id);
                                    td.html('<a href="<?php echo SUB_DIR; ?>/manager/enrollments/huy_dong_hoc_phi/' + result.id + '" class="huy_dong_hoc_phi_btn"><i class="fa fa-check text-success"></i></a>');
                                    bienlai_td.html(result.sobienlai);
                                    $form.parents('.bootbox').modal('hide');

                                }

                            }, 'json');
                        }
                    }
                }
            }).on('shown.bs.modal', function() {
                $('#hocphiform')
                        .show()                                 // Show the login form
                        .bootstrapValidator('resetForm', true); // Reset form
            })
                    .on('hide.bs.modal', function(e) {                                 // Bootbox will remove the modal (including the body which contains the login form)
                        // after hiding the modal
                        // Therefor, we need to backup the form
                        $('#hocphiform').hide().appendTo('body');
                    });
            return false;
        });

        //Xử lý lúc hủy đóng học phí

        $(document).on("click", "a.huy_dong_hoc_phi_btn", function(e) {
            var _this = this;
            e.preventDefault();
            bootbox.confirm("Bạn chắc muốn thực hiện?", function(result) {
                if (result) {
                    $.post($(_this).attr('href'), function(result) {
                        if (!result.success) {
                            bootbox.alert(result.message);
                        } else {                                 // ... Process the result ...
                            //bootbox.alert(result.sobienlai);
                            // Hide the modal containing the form
                            var td = $("#dong_hoc_phi_td_" + result.id);
                            var bienlai_td = $("#bienlai_td_" + result.id);
                            bienlai_td.html("");
                            td.html('<a href="<?php echo SUB_DIR; ?>/manager/enrollments/dong_hoc_phi/' + result.id + '" class="dong_hoc_phi_btn"><i class="fa fa-times text-danger"></i></a>');


                        }

                    }, 'json');
                }
            });

        });
        //Xử lý lúc clich nút vắng
        $(document).on("click", "a.vang_btn", function(e) {

            var _this = this;
            e.preventDefault();
            bootbox.dialog({
                message: $('#vangform'),
                buttons: {
                    success: {
                        label: "Thực hiện!",
                        className: "btn-success",
                        callback: function() {
                            e.preventDefault();
                            var $form = $('#vangform'), // The form instance
                                    bv = $form.data('bootstrapValidator');   // BootstrapValidator instance

                            $.post($(_this).attr('href'), $form.serialize(), function(result) {
                                if (!result.success) {
                                    bootbox.alert(result.message);
                                } else {                                 // ... Process the result ...
                                    //bootbox.alert(result.sobienlai);
                                    // Hide the modal containing the form
                                    var td = $("#vang_" + result.id);
                                    var ly_do_vang = $("#ly_do_vang_" + result.id);
                                    td.html('<a href="<?php echo SUB_DIR; ?>/manager/enrollments/huy_vang/' + result.id + '" class="huy_vang_btn"><i class="fa fa-check text-success"></i></a>');
                                    ly_do_vang.html(result.ly_do_vang);
                                    $form.parents('.bootbox').modal('hide');

                                }

                            }, 'json');
                        }
                    }
                }
            }).on('shown.bs.modal', function() {
                $('#vangform')
                        .show()                                 // Show the login form
                        .bootstrapValidator('resetForm', true); // Reset form
            })
                    .on('hide.bs.modal', function(e) {                                 // Bootbox will remove the modal (including the body which contains the login form)
                        // after hiding the modal
                        // Therefor, we need to backup the form
                        $('#vangform').hide().appendTo('body');
                    });
            return false;
        });
        //Xử lý lúc hủy đóng học phí

        $(document).on("click", "a.huy_vang_btn", function(e) {
            var _this = this;
            e.preventDefault();

            bootbox.confirm("Bạn chắc muốn thực hiện?", function(result) {
                if (result) {
                    $.post($(_this).attr('href'), function(result) {
                        if (!result.success) {
                            bootbox.alert(result.message);
                        } else {                                 // ... Process the result ...
                            //bootbox.alert(result.sobienlai);
                            // Hide the modal containing the form
                            var td = $("#vang_" + result.id);
                            var ly_do_vang = $("#ly_do_vang_" + result.id);
                            td.html('<a href="<?php echo SUB_DIR; ?>/manager/enrollments/vang/' + result.id + '" class="vang_btn"><i class="fa fa-times text-danger"></i></a>');
                            ly_do_vang.html("");
                        }

                    }, 'json');
                }
            });

        });
    });
</script>
