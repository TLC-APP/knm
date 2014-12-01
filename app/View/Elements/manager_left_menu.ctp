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
            <a href="<?php echo SUB_DIR . '/dashboards' ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Quản lý lớp kỹ năng </span>

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
                    <a href="<?php echo SUB_DIR . '/courses/index' ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tất cả lớp
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
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Quản lý người dùng </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

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