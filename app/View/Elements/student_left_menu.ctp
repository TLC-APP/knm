<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="nav nav-list">
        <li class="">
            <?php
            echo $this->Html->link(__('dashboard'), array('plugin' => false, 'controller' => 'dashboards', 'action' => 'home'), array('escape' => false));
            ?>


            <b class="arrow"></b>
        </li>



        <li class="">
            

            <?php
            echo $this->Html->link(__('dang ky'), array('plugin' => false, 'student'=>true,'controller' => 'courses', 'action' => 'index'), array('escape' => false));
            ?>

           
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Yêu cầu chứng nhận </span>

            </a>

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