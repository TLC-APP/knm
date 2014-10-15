<?php if (count($loginUser['Group']) > 1): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Vai trò</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <?php foreach ($loginUser['Group'] as $group): ?>
                <li>
                    <?php
                    if ($group['alias'] != $this->params['prefix'])
                        echo $this->Html->link('<i class="fa fa-angle-double-right"></i>' . $group['name'], array(
                            'controller' => 'dashboards',
                            'action' => 'home', $group['alias'] => true), array('escape' => false));
                    ?>                
                </li>

            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>