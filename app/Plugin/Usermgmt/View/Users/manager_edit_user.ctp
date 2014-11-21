<div id="signup-box" class="signup-box  widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger">
                <i class="ace-icon fa fa-edit blue"></i>
                Cập nhật thông tin tài khoản
            </h4>
            <div class="space-6"></div>
            <?php
            echo $this->Form->create('User', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'label' => array(
                        'class' => 'col col-md-3 control-label'
                    ),
                    'wrapInput' => 'col col-md-9',
                    'class' => 'form-control'
                ),
                'class' => 'well form-horizontal'
            ));
            ?>
            <fieldset>

                <?php
                echo $this->Form->input('id');
                echo $this->Form->input('last_name', array(
                    'required', 'label' => 'Họ lót'));
                echo $this->Form->input('first_name', array(
                    "label" => "Tên",
                    'required',
                ));
                echo $this->Form->input('email', array(
                    "type" => 'email',
                    'required',
                    "placeholder" => "Email",
                ));
                echo $this->Form->input('phone', array(
                    "label" => "Số điện thoại",
                    'required',
                ));
                
                echo $this->Form->input('Chapter', array(
                    "label" => "Giảng dạy"
                ));

                echo $this->Form->input('department_id', array("label" => 'Đơn vị','empty'=>'Chọn đơn vị'));
                ?>

                <?php if (USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA != "" && PUBLIC_KEY_FROM_RECAPTCHA != "") { ?>
                    <div>
                        <div class="umstyle4" style="margin-left:45px"><?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
                        <div style="clear:both"></div>
                    </div>
                <?php } ?>
                <div class="space-24"></div>

                <div class="clearfix">
                    <?php echo $this->Html->link('Back', array('action' => 'myprofile', $this->Form->value('User.id')), array('class' => 'btn btn-info')) ?>
                    <button type="submit" class="pull-right btn btn-sm btn-success">
                        <span class="bigger-110">Cập nhật</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </fieldset>
            <?php $this->Form->end(); ?>


        </div>
    </div><!-- /.widget-body -->
</div>
<script>
    $(function () {
        $('#UserDepartmentId').select2();

    });
</script>


<?php echo $this->Html->css('select2-bootstrap'); ?>
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->script('select2.min'); ?>




