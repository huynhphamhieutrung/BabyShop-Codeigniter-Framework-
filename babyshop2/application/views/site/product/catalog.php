<h1><?php echo $catalog->TenLoaiSanPham?> có <?php echo $total_rows?> sản phẩm</h1>
<div class="row">
<?php foreach ($list as $row):?> 
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
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
<div class="pagination">
    <?php echo $this->pagination->create_links()?>
</div>