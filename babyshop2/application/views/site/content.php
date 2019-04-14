<img class="card-img-top" src="<?php echo img_url()?>/hot.gif" alt="Sản phẩm đang hot">     
<div class="row">
<?php foreach ($productHot as $row):?>
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-50">
      <a href="<?php echo base_url('product/view/'.$row->MaSanPham)?>"><img class="card-img-top" src="<?php echo images_url();?>/<?php echo $row->HinhURL?>"></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="<?php echo base_url('product/view/'.$row->MaSanPham)?>"><?php echo $row->TenSanPham?></a>
          </h4>
        </div>
    </div>
  </div>
<?php endforeach;?>
</div>

<img class="card-img-top" src="<?php echo img_url()?>/cold.gif" alt="Sản phẩm đang cold">  
<div class="row">
<?php foreach ($productCold as $row):?>
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-50">
      <a href="<?php echo base_url('product/view/'.$row->MaSanPham)?>"><img class="card-img-top" src="<?php echo images_url();?>/<?php echo $row->HinhURL?>"></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="<?php echo base_url('product/view/'.$row->MaSanPham)?>"><?php echo $row->TenSanPham?></a>
          </h4>
        </div>
    </div>
  </div>
<?php endforeach;?>
</div>
        

      

    