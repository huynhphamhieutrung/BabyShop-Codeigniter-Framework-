<html>

    <head>
        <?php $this->load->view('site/head');?>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background-color: #ff66cc;">
            <?php $this->load->view('site/header')?>
        </nav>

        <div class="container">
            <div class="row">

                <div class="col-lg-3" style="background-color:powderblue;">
                    <div id='cssmenu'  style="width:100%;" >
                        <?php $this->load->view('site/sidebar',$this->data)?>
                    </div>
                </div>
                <!-- /.col-lg-3 -->
                <div class="col-lg-9" style="background-color:powderblue;">
                    <?php $this->load->view('site/all_product/catalog',$this->data)?>
                    
                </div>

            </div>
            <!-- /.row -->
        </div>
        

        <footer class="bg-dark">
            <?php $this->load->view('site/footer')?>
            </nav>
        </footer>

    </body>

</html>