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
            <a href="<?php echo SUB_DIR ?>/teacher/periods" >
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Thời khóa biểu</span>
            </a>

        </li>
        <li class="">
            <a href="<?php echo SUB_DIR . '/teaching_plans/add' ?>">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text">Lập kế hoạch dạy</span>
            </a>
            <b class="arrow"></b>

        </li>




<!--
        <li class="">
            <a href="#">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Thống kê giờ giảng</span>
            </a>

            <b class="arrow"></b>
        </li>-->
        <li class="">


            <?php
            echo $this->Html->link(__("profile"), array('teacher' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'profile'), array('escape' => false));
            ?>


        </li>

        <li class="">


            <?php
            echo $this->Html->link(__("change_password"), "/changePassword", array('escape' => false));
            ?>


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