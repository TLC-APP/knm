<!-- PAGE CONTENT BEGINS -->

<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-3 center">
        <div>
            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="<?php echo $student['User']['name'] ?>" src="<?php echo SUB_DIR ?>/img/<?php echo ($student['User']['sex']) ? 'boy.jpg' : 'woman.jpg' ?>" style="display: block;"></img>
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

                    <span class="editable editable-click" id="lop"><?php echo $student['Classroom']['name'] ?></span>
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

        </div>
    </div>
</div>
<div class="row">
    <h2>Các kỹ năng đã tham dự</h2>
    <?php foreach ($student['Enrollment'] as $enroll) : ?>
        <table class="table table-condensed table-hover">
            <thead>
            <th>Kỹ năng</th>
            <th>Mã lớp</th>
            <th>Tình trạng lớp</th>
            <th>Kết quả</th>
            <th>Học phí</th>
            <th>Số biên lai</th>
            <th>Vắng</th>
            <th>Lý do vắng</th>
            <th>Ghi chú</th>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $enroll['Course']['Chapter']['name'] ?></td>
                    <td><?php echo $enroll['Course']['name'] ?></td>
                    <td>                        
                        <?php echo $this->element('course_status', array('status' => $enrollment['Course']['trang_thai'])); ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
</div>

