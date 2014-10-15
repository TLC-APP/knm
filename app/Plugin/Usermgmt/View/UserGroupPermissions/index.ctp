<?php
echo $this->Html->script('Usermgmt.umupdate');
?>

    <?php echo $this->Session->flash(); ?>


    <div class="well">
        <div id="permissions">
            <div>
                <div class="page-header"><h2>Bảng phân quyền</h2>
                    <div class="pull-right">
                        <?php
                        echo $this->Form->input("controller", array(
                            'type' => 'select',
                            'div' => false,
                            'options' => $allControllers,
                            'selected' => $c,
                            'label' => false,
                            "onchange" => "window.location='" . SITE_URL . "permissions/?c='+(this).value")
                        )
                        ?>
                    </div>
                </div>

            </div>
            <?php if (!empty($controllers)) { ?>
                <input type="hidden" id="BASE_URL" value="<?php echo SITE_URL ?>">
                <input type="hidden" id="groups" value="<?php echo $groups ?>">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th> <?php echo __("Controller"); ?> </th>
                            <th> <?php echo __("Action"); ?> </th>
                            <th> <?php echo __("Permission"); ?> </th>
                            <th> <?php echo __("Operation"); ?> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k = 1;
                        foreach ($controllers as $key => $value) {
                            if (!empty($value)) {
                                for ($i = 0; $i < count($value); $i++) {
                                    if (isset($value[$i])) {
                                        $action = $value[$i];
                                        echo $this->Form->create();
                                        echo $this->Form->hidden('controller', array('id' => 'controller' . $k, 'value' => $key));
                                        echo $this->Form->hidden('action', array('id' => 'action' . $k, 'value' => $action));
                                        echo "<tr>";
                                        echo "<td>" . $key . "</td>";
                                        echo "<td>" . $action . "</td>";
                                        echo "<td>";
                                        foreach ($user_groups as $user_group) {
                                            $ugname = $user_group['name'];
                                            $ugname_alias = $user_group['alias_name'];
                                            if (isset($value[$action][$ugname_alias]) && $value[$action][$ugname_alias] == 1) {
                                                $checked = true;
                                            } else {
                                                $checked = false;
                                            }

                                            echo $this->Form->input($ugname_alias, array('id' => $ugname_alias . $k, 'type' => 'checkbox', 'checked' => $checked, 'label' => $ugname));
                                        }
                                        echo "</td>";
                                        echo "<td>";
                                        echo $this->Form->button('Cập nhật', array('type' => 'button', 'id' => 'mybutton123', 'name' => $k, 'onClick' => 'javascript:update_fields(' . $k . ');', 'class' => 'umbtn'));
                                        echo "<div id='updateDiv" . $k . "' align='right' class='updateDiv'>&nbsp;</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo $this->Form->end();
                                        $k++;
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
