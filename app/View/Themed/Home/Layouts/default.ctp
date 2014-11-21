<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Trang chủ - Website quản lý Dạy và Học Kỹ năng mềm sinh viên - Trung tâm Hỗ trợ - Phát triển Dạy và Học Trường Đại học Trà Vinh</title>

        <!-- Bootstrap Core CSS -->
        <?php echo $this->Html->css('bootstrap.min') ?>

        <!-- Custom CSS -->
        <?php echo $this->Html->css('small-business') ?>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="http://placehold.it/150x50&text=Logo" alt="">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#">Thông báo</a>
                        </li>
                        <li>
                            <a href="#">Kỹ năng</a>
                        </li>
                        <li>
                            <a href="#">Phòng học</a>
                        </li>
                        <li>
                            <a href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>

            <!-- Footer -->
            <hr>
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Xây dựng bởi <a href="http://tlc.tvu.edu.vn">Trung tâm Hỗ trợ - Phát triển Dạy và Học</a> năm 2014</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <?php echo $this->Html->script('jquery') ?>

        <!-- Bootstrap Core JavaScript -->
        <?php echo $this->Html->script('bootstrap.min') ?>

    </body>

</html>
