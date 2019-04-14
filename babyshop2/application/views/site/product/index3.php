<html>

    <head>
        <?php $this->load->view('site/head');?>
    </head>

    <body background="<?php echo img_url()?>/page_bg.gif">
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

                    <?php $this->load->view('site/product/view',$this->data)?>
                
                </div>
            </div>
        </div>
        </div>
    </div>
    
    </div>
    
    </body>
    
</html>