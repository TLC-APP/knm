<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>Hệ thống Quản lý Dạy và học Kỹ năng mềm Sinh viên</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="Hệ thống Quản lý Dạy và học Kỹ năng mềm Sinh viên" content="">    
        <link rel="shortcut icon" href="favicon.ico">  
        <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'); ?>
        <!-- Global CSS -->
        <?php echo $this->Html->css('bootstrap.min') ?>
        <!-- Plugins CSS -->    
        <?php echo $this->Html->css('font-awesome.min') ?>
        <!-- Theme CSS -->  
        <?php echo $this->Html->css('default') ?>
        <!-- Javascript -->          
        <?php echo $this->Html->script('jquery-1.10.2.min'); ?>
        <?php echo $this->Html->script('jquery-migrate-1.2.1.min'); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>
        <?php echo $this->Html->script('bootstrap-hover-dropdown.min'); ?>
        <?php echo $this->Html->script('back-to-top'); ?>
        <?php echo $this->Html->script('main'); 
        
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body class="home-page">
        <div class="wrapper">
            <!-- ******HEADER****** --> 
            <header class="header">  

                <div class="header-main container">
                    <h1 class="logo  col-md-4 col-sm-4">
                        <?php //echo $this->Html->link($this->Html->image('banner.jpg'),array('controller' => 'dashboards', 'action' => 'home'), array('escape' => false,'id'=>'logo')); ?>
                    </h1><!--//logo-->        

                </div><!--//header-main-->
            </header>
            <!--//header-->

            <!-- ******NAV****** -->
            <nav class="main-nav" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>          
                    <div class="navbar-collapse collapse pull-right" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class=" nav-item">
                                <?php echo $this->Html->link('Trang chủ', array('controller' => 'dashboards', 'action' => 'home')); ?>
                            </li>
                            <li class=" nav-item">
                                <?php echo $this->Html->link('Quy định', array('controller' => 'dashboards', 'action' => 'prolicies')); ?>
                            </li>
                            <li class=" nav-item">
                                <?php echo $this->Html->link('Hướng dẫn sử dụng', array('controller' => 'dashboards', 'action' => 'help')); ?>
                            <li class=" nav-item">
                                <?php //echo $this->Html->link('Liên hệ', array('controller' => 'dashboards', 'action' => 'contact')); ?>
                            </li>

                            
                            
                        </ul>
                        

                    </div>
                </div>
            </nav>
            <!--//main-nav-->

            <!-- ******CONTENT****** --> 
            <div class="content container">
                <div class="row">

                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                </div>
                <div class="row cols-wrapper">                 
                    <?php echo $this->fetch('content'); ?>

                </div><!--//cols-wrapper-->

            </div><!--//content-->
        </div><!--//wrapper-->

        <!-- ******FOOTER****** --> 
        <footer class="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-3 col-sm-4 about">
                            <div class="footer-col-inner">
                                <h3>Giới thiệu</h3>
                                <ul>
                                    <li><a href="http://tlc.tvu.edu.vn/index.php/gioi-thieu-ve-tlc/chuc-nam-nhiem-vu"><i class="fa fa-caret-right"></i>TLC</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i>Quy định sử dụng</a></li>
                                </ul>
                            </div><!--//footer-col-inner-->
                        </div><!--//foooter-col-->
                        <div class="footer-col col-md-6 col-sm-8 newsletter">

                        </div><!--//foooter-col--> 
                        <div class="footer-col col-md-3 col-sm-12 contact">
                            <div class="footer-col-inner">
                                <h3>Liên hệ</h3>
                                <div class="row">
                                    <p class="adr clearfix col-md-12 col-sm-4">
                                        <i class="fa fa-map-marker pull-left"></i>        
                                        <span class="adr-group pull-left">       
                                            <span class="street-address">Trung tâm HTPT Dạy và học</span><br>
                                            <span class="street-address">Trường ĐH Trà Vinh</span><br>
                                            <span class="region"> Phòng: A11.408, Khu hiệu bộ </span>

                                        </span>
                                    </p>
                                    <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i> 0743 765364 - Số nội bộ: 102</p>
                                    <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">thaitoan2210@gmail.com</a></p>  
                                </div> 
                            </div><!--//footer-col-inner-->            
                        </div><!--//foooter-col-->   
                    </div>   
                </div>        
            </div><!--//footer-content-->

        </footer>  

    </body>
</html> 

