<div class="box">
    <div class="col-lg-12 text-center">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden-xs">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">

                    <?php
                    echo $this->Html->image('slideshows/timkiem.jpg', array(
                        "class" => "img-responsive img-rounded",
                        'url' => array('controller' => 'chapters', 'action' => 'view', 1)
                        ));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/thuyettrinh.jpg', array(
                        "class" => "img-responsive img-rounded",
                        'url' => array('controller' => 'chapters', 'action' => 'view', 2)
                        ));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/sangtao.jpg', array(
                        'url' => array('controller' => 'chapters', 'action' => 'view', 4),
                        "class" => "img-responsive img-rounded"));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/quanlythoigian.jpg', array('url' => array('controller' => 'chapters', 'action' => 'view', 5),"class" => "img-responsive img-rounded"));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/quanlybanthan.jpg', array('url' => array('controller' => 'chapters', 'action' => 'view', 8),"class" => "img-responsive img-rounded"));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/giaiquyetvande.jpg', array('url' => array('controller' => 'chapters', 'action' => 'view', 6),"class" => "img-responsive img-rounded"));
                    ?>
                </div>
                <div class="item">
                    <?php
                    echo $this->Html->image('slideshows/lamviecnhom.jpg', array('url' => array('controller' => 'chapters', 'action' => 'view', 9),"class" => "img-responsive img-rounded"));
                    ?>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>


    </div>
</div>