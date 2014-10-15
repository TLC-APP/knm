<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->element('head'); ?>

    </head>

    <body class="no-skin">
        <?php echo $this->element('header'); ?>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <?php echo $this->element('manager_left_menu'); ?>

            <div class="main-content">
                <?php echo $this->element('breadcrumbs'); ?>

                <div class="page-content">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->

            <?php echo $this->element('footer') ?>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
    </body>
</html>
