<!-- PAGE CONTENT BEGINS -->

<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-3 center">
        <div>
            <span class="profile-picture">

                <?php
                echo $this->Html->image('/assets/avatars/profile-pic.jpg', array('class' => "editable img-responsive editable-click editable-empty",
                    'style' => "display: block;",
                    'alt', "Alex's Avatar"));
                ?>
            </span>

            <div class="space-4"></div>
            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php echo $user['User']['name'] ?></span>
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
                <div class="profile-info-name"> Username </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $user['User']['username'] ?></span>
                </div>
            </div>

            
            <div class="profile-info-row">
                <div class="profile-info-name"> Đơn vị </div>

                <div class="profile-info-value">

                    <span class="editable editable-click" id="lop"><?php echo $user['Department']['name'] ?></span>
                </div>
            </div>

            
            <div class="profile-info-row">
                <div class="profile-info-name"> Email </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $user['User']['email'] ?></span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Số điện thoại </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age"><?php echo $user['User']['phone'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name">Ngày tham gia </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="signup"><?php echo $user['User']['created'] ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Lần đăng nhập cuối </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="login" style="display: inline;"><?php echo $user['User']['last_login'] ?></span>
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
            </button>', array('action' => 'editUser', $user['User']['id']), array('escape' => false)); ?>

        </div>
    </div>
</div>

