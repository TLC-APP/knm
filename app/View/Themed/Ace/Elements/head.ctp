<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php echo $this->Html->charset(); ?>
<title>Trang đăng nhập - <?php echo APP_NAME ?></title>

<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<?php echo $this->Html->css('bootstrap.min') ?>
<?php echo $this->Html->css('/font-awesome/4.1.0/css/font-awesome.min') ?>

<!-- page specific plugin styles -->
<?php echo $this->Html->css('jquery-ui.min') ?>

<?php echo $this->Html->css('ui.jqgrid') ?>
<!-- text fonts -->
<?php echo $this->Html->css('css-family=Open+Sans-400,300') ?>

<!-- ace styles -->
<?php echo $this->Html->css('ace.min') ?>

<!--[if lte IE 9]>
<?php echo $this->Html->css('ace-part2.min') ?>
<![endif]-->
<?php echo $this->Html->css('ace-skins.min') ?>
<?php echo $this->Html->css('ace-rtl.min') ?>


<!--[if lte IE 9]>
<?php echo $this->Html->css('ace-ie.min') ?>

<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<?php echo $this->Html->script('ace-extra.min') ?>


<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<?php echo $this->Html->script('html5shiv.min') ?>
<?php echo $this->Html->script('respond.min') ?>

<![endif]-->
<!-- basic scripts -->

<!--[if !IE]> -->
<?php echo $this->Html->script('jquery.min') ?>
<?php echo $this->Html->script('jquery-ui.custom.min') ?>
<!-- <![endif]-->
<?php echo $this->Html->script('jquery-migrate-1.2.1') ?>
<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo SUB_DIR; ?>/js/jquery.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='<?php echo SUB_DIR; ?>/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<?php echo $this->Html->script('bootstrap.min') ?>


<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/js/excanvas.min.js"></script>
<![endif]-->
<?php echo $this->Html->script('jquery-ui.custom.min') ?>

<?php echo $this->Html->script('jquery.ui.touch-punch.min') ?>

<!-- ace scripts -->
<?php echo $this->Html->script('ace-elements.min') ?>

<?php echo $this->Html->script('ace.min') ?>

<?php
echo $this->Html->script('date-time/bootstrap-datepicker.min');
echo $this->Html->script('date-time/bootstrap-datepicker.vi');
echo $this->Html->script('date-time/bootstrap-timepicker.min');
echo $this->Html->script('date-time/moment.min');
echo $this->Html->script('date-time/daterangepicker.min');
echo $this->Html->script('date-time/bootstrap-datetimepicker.min');
?>
<?php echo $this->Html->css('datepicker') ?>
<?php echo $this->Html->css('bootstrap-timepicker') ?>
<?php echo $this->Html->css('daterangepicker') ?>
<?php echo $this->Html->css('bootstrap-datetimepicker') ?>
<script>
    $(function () {
        var path = window.location.pathname;
        path = path.replace(/\/$/, "");
        path = decodeURIComponent(path);
        $("#sidebar a").each(function () {

            var href = $(this).attr('href');
            if (path === href) {
                $(this).closest('li').addClass('active');

                var treeviewmenu = $(this).closest('li').parent();
                treeviewmenu.parent().addClass('active');
            }
        });
        $('.date-picker').datepicker({
            language: 'vi',
            clearBtn: true,
            autoclose: true,
            todayHighlight: true,
            format:'yyyy-mm-dd'
        })

                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function () {
            $(this).prev().focus();
        });
    });
</script>