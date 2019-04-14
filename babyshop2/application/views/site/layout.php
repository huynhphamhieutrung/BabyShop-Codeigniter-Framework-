<html>

    <head>
        <?php $this->load->view('site/head');?>
    </head>

    <body >
    <div class="bg" >
        <div id="wrapper"style="background: url('<?php echo img_url()?>/page_bg.gif')" >
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background-color: #ff66cc;">
            <?php $this->load->view('site/header')?>
        </nav>

        <div class="container">
            <div class="row">

                <div class="col-lg-3" style="background-color:powderblue;">
                    <div id='cssmenu' style="width:100%;" >
                        <?php $this->load->view('site/sidebar',$this->data)?>
                    </div>
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9" style="background-color:powderblue;">
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" style="background-color:powderblue;"> 
                        <?php $this->load->view('site/carousel')?>
                    </div>
                    <!-- /.carousel -->
                    <?php $this->load->view('site/content')?>
                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.bg -->
    <footer class="bg-dark">
        <?php $this->load->view('site/footer')?>
    </footer>
    
    </div>
    
    </body>
    
</html>