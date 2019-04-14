<html>

    <head>
        <?php $this->load->view('site/head');?>
    </head>

    <body>
    <div class="bg">
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
                    <?php $this->load->view('site/cart/shoppingcart',$this->data)?>
                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
        </div>

    
    </div>
    </body>
    
</html>