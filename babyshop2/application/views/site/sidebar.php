<ul>
   <li><a style="font-family:verdana;font-size:16px;font-weight: 900;"><span>DANH MỤC</span></a></li>
   <li class='has-sub'><a href='#' style="font-weight: 900;"><span><center>Hãng sản xuất</center></span></a>
      <ul>
         <?php foreach ($producer_list as $row):?>
         <li><a href="<?php echo base_url('product/producer/'.$row->MaHangSanXuat)?>"<span><img src="<?php echo images_url('/'.$row->LogoURL)?>" style="width:100%;height:20%;border-radius:25px;"></span></a></li>
         <?php endforeach;?>
      </ul>
   </li>
   <li class='has-sub '><a href='#' style="font-weight: 900;"><span><center>Loại sản phẩm</center></span></a>
      <ul>
         <?php foreach ($catalog_list as $row):?>
            <li><a href='<?php echo base_url('product/catalog/'.$row->MaLoaiSanPham)?>'><span><?php echo $row->TenLoaiSanPham?></span></a></li>
            <!-- <li><a href='#'><span>Product 2</span></a></li>
            <li class='last'><a href='#'><span>Product 3</span></a></li> -->
         <?php endforeach;?>
      </ul>
   </li>
</ul>
