<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <meta charset="UTF-8">
        <title>Hệ thống quản lý Thông tin Tập huấn Giáo viên | Trang phục vụ quản lý chung</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <!-- font Awesome -->
        <?php echo $this->Html->css('font-awesome.min'); ?>

        <!-- Theme style -->
        <?php echo $this->Html->css('AdminLTE'); ?>

        <?php echo $this->Html->script('jquery-1.10.2.min'); ?>

        <?php echo $this->Html->script('jquery-migrate-1.2.1.min'); ?>
        <!-- jQuery UI 1.10.3 -->
        <?php echo $this->Html->script('jquery-ui-1.10.3.min') ?>
        <!-- Bootstrap -->
        <?php echo $this->Html->script('bootstrap.min') ?>

        <!-- AdminLTE App -->
        <?php echo $this->Html->script('app') ?>

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php echo $this->Html->link('TMS', array('controller' => 'dashboards', 'action' => 'home', 'manager' => false), array('class' => 'logo')); ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class=" messages-menu">
                            <a href="<?php echo SUB_DIR; ?>" target="_blank"><i class="fa fa-eye"></i>
                                Xem trang
                            </a>

                        </li>
                        <!-- User Account: style can be found in dropdown.less -->

                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- search form -->

                    <form action="<?php echo SUB_DIR; ?>/manager/users/search" method="post" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng cần tìm..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <?php
                        //Nếu người dùng thuộc nhiều nhóm sẽ hiển thị menu vai trò
                        //echo $this->element('role_menu');
                        ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Khóa học</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?php
                                    echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Thêm mới', array('manager' => true, 'controller' => 'courses', 'action' => 'add'), array('escape' => false));
                                    ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Đang đăng ký', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_REGISTERING), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i> Chưa hoàn thành', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_UNCOMPLETED), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Đã hoàn thành', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_COMPLETED), array('escape' => false)); ?>

                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Đã hủy', array('manager' => true, 'controller' => 'courses', 'action' => 'index', COURSE_CANCELLED), array('escape' => false)); ?>
                                </li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Lĩnh vực</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'fields', 'action' => 'index'), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'fields', 'action' => 'add'), array('escape' => false)); ?>
                                </li>
                            </ul>
                        </li>


                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Chuyên đề</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'chapters', 'action' => 'index'), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'chapters', 'action' => 'add'), array('escape' => false)); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Đơn vị</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'departments', 'action' => 'index'), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'departments', 'action' => 'add'), array('escape' => false)); ?>
                                </li>

                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Phòng học</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'rooms', 'action' => 'index'), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'rooms', 'action' => 'add'), array('escape' => false)); ?>
                                </li>

                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Người dùng</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">                    
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'users', 'action' => 'add'), array('escape' => false)); ?>
                                </li>


                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Thông báo</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">


                                <li>
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Danh sách', array('manager' => true, 'controller' => 'messages', 'action' => 'index'), array('escape' => false)); ?>

                                </li>
                                <li>                    
                                    <?php echo $this->Html->link('<i class="fa fa-angle-double-right"></i>Thêm mới', array('manager' => true, 'controller' => 'messages', 'action' => 'add'), array('escape' => false)); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sign-in"></i> <span>Thống kê</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo SUB_DIR; ?>/manager/courses/thong_ke"><i class="fa fa-angle-double-right"></i> Khóa học</a></li>
                                <li><a href="<?php echo SUB_DIR; ?>/manager/attends/thong_ke_student"><i class="fa fa-angle-double-right"></i> Người tham dự</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <ol class="breadcrumb">
                        <?php echo $this->Html->getCrumbs(' > '); ?>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html> 

