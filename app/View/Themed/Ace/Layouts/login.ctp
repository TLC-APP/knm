<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->element('head'); ?>
        
        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>


    </head>
    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">

<?php echo $this->fetch('content'); ?>
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

       <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                
                $(document).on('click', '.toolbar a[data-target]', function(e) {
                    e.preventDefault();
                    var target = $(this).data('target');
                    $('.widget-box.visible').removeClass('visible');//hide others
                    $(target).addClass('visible');//show target
                });
            });

            //you don't need this, just used for changing background
            jQuery(function($) {
                $('#btn-login-dark').on('click', function(e) {
                    $('body').attr('class', 'login-layout');
                    $('#id-text2').attr('class', 'white');
                    $('#id-company-text').attr('class', 'blue');

                    e.preventDefault();
                });
                $('#btn-login-light').on('click', function(e) {
                    $('body').attr('class', 'login-layout light-login');
                    $('#id-text2').attr('class', 'grey');
                    $('#id-company-text').attr('class', 'blue');

                    e.preventDefault();
                });
                $('#btn-login-blur').on('click', function(e) {
                    $('body').attr('class', 'login-layout blur-login');
                    $('#id-text2').attr('class', 'white');
                    $('#id-company-text').attr('class', 'light-blue');

                    e.preventDefault();
                });

            });
        </script>


    </body>