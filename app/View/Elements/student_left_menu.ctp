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
            echo $this->Html->link(__('score'), array('plugin' => false, 'controller' => 'dashboards', 'action' => 'home'), array('escape' => false));
            ?>


            <b class="arrow"></b>
        </li>



        <li class="">


            <?php
            echo $this->Html->link(__('dang ky'), array('plugin' => false, 'student' => true, 'controller' => 'courses', 'action' => 'index'), array('escape' => false));
            ?>


        </li>




        <li class="">


            <?php
            echo $this->Html->link(__("profile"), array('student' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'profile'), array('escape' => false));
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