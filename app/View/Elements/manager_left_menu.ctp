<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed');
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="">
            <a href="<?php echo SUB_DIR . '/dashboards/home' ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="<?php echo SUB_DIR . '/manager/teaching_plans/add' ?>">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text"> Lập kế hoạch dạy </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Lớp kỹ năng </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR . '/courses/add' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo lớp
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR . '/manager/courses' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tất cả lớp
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Lớp sinh viên </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR . '/classrooms/add' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo lớp
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR . '/classrooms/index' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tất cả lớp
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Đơn vị </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR . '/manager/departments/add' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR . '/manager/departments/index' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tất cả đơn vị
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Quản lý kỹ năng </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo SUB_DIR . '/chapters' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách kỹ năng
                    </a>

                    <a href="<?php echo SUB_DIR . '/chapter_types' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Loại kỹ năng
                    </a>
                    <b class="arrow"></b>
                </li>


            </ul>
        </li>

        <li class="">
            <?php
            echo $this->Html->link(__("users"), "#", array('escape' => false, "class" => "dropdown-toggle"));
            ?>





            <ul class="submenu">
                <li class="">
                    <a href="<?php echo SUB_DIR . '/sinh-vien' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sinh viên
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR . '/giang-vien' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Giảng viên
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR . '/them-giang-vien' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm giảng viên
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>
        <li class="">
            <?php
            echo $this->Html->link(__("chung nhan"), array('plugin' => false, 'manager' => true, 'controller' => 'certs', "action" => "index"), array('escape' => false));
            ?>
            <b class="arrow"></b>
        </li>
        <li class="">
            <?php
            //echo $this->Html->link(__("thong ke"), array('controller' => 'certs', "action" => "index"), array('escape' => false));
            ?>
        </li>
        <li class="">


            <?php
            echo $this->Html->link(__("change_password"), "/changePassword", array('escape' => false));
            ?>


        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Thông báo </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR . '/messages/add' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR . '/thong-bao' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tất cả
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">


            <?php
            echo $this->Html->link(__("logout"), "/logout", array('escape' => false));
            ?>


        </li>

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>