
         <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4" class="active"></li>
            </ol>
            
            <div class="carousel-inner" role="listbox" style="border-radius:500px;border-">
              <?php $count = 0; 
                $indicators = ''; 
                foreach ($productNewest as $row): 
                $count++; 
                if ($count === 1) 
                { 
                    $class = 'active'; 
                }  
                else 
                { 
                    $class = ''; 
                }?> 
                <div class="carousel-item <?php echo $class; ?>" >
                    <a href="<?php echo base_url('product/view/'.$row->MaSanPham)?>">
                      <img class="d-block img-fluid" src="<?php echo images_url();?>/<?php echo $row->HinhURL?>" style="width:100%;height:250px;">
                    </a>
                </div>
              <?php endforeach;?>
              
              
            </div>
          
            <a class="carousel-control-prev"  href="#carouselExampleIndicators " role="button" data-slide="prev" >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

