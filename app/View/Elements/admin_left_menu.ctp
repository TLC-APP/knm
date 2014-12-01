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
            <a href="<?php echo SUB_DIR.'/dashboards'?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>

        <!--Menu user-->
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Quản trị User </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR.'/addUser'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm mới
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/users/'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách User
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/addGroup'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm nhóm
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/allGroups'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách nhóm
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/permissions'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Phân quyền
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <!--Hết menu user-->
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Quản lý lớp kỹ năng </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="<?php echo SUB_DIR.'/courses/add'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm mới
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/courses/index/1'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lớp chờ phân công
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/courses/index/2'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lớp đã phân công
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/courses/index/3'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lớp chờ hủy
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/courses/index/4'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Lớp đã hủy
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
                    <a href="<?php echo SUB_DIR.'/chapters'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách kỹ năng
                    </a>
                    <a href="<?php echo SUB_DIR.'/chapters/add'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm mới kỹ năng
                    </a>
                    <a href="<?php echo SUB_DIR.'/chapter_types'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách loại kỹ năng
                    </a>
                    <b class="arrow"></b>
                </li>


            </ul>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Quản lý giảng viên </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="<?php echo SUB_DIR.'/users/index/teachers'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo SUB_DIR.'/users/add/teachers'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm mới
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Quản lý sinh viên </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="<?php echo SUB_DIR.'/classrooms'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách lớp
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo SUB_DIR.'/classrooms/add'?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Thêm lớp
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="" class="dropdown-toggle">
            <a href="#">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Thống kê </span>
                 <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
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