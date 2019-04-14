
<div id="chitietsp" style="background-color:powderblue;">
    <h1>Thông tin chi tiết sản phẩm</h1>
	<div id="chitietleft">
    <?php foreach ($query AS $row):?>
        <img src="<?php echo images_url();?>/<?php echo $row->HinhURL?>">
    </div>
    <div id="chitietright">
    	<div>
        	<span class="label">Tên sản phẩm:</span>
            <span class="productname"><?php echo $row->TenSanPham?></span>
        </div>
        <div>
        	<span class="label">Giá:</span>
            <span class="price"><?php echo $row->GiaSanPham?> VNĐ</span>
        </div>
        <div>
        	<span class="label">Hãng sản xuất:</span>
            <span class="factory"><?php echo $row->TenHangSanXuat?></span>
        </div>
        <div>
        	<span class="label">Loại sản phẩm:</span>
            <span class="data"><?php echo $row->TenLoaiSanPham?></span>
        </div>
        <div>
        	<span class="label">Số lượng:</span>
            <span class="data"><?php echo $row->SoLuongTon?> sản phẩm</span>
        </div>
        <div>
        	<span class="label">Số lượt xem:</span>
            <span class="data"><?php echo $row->SoLuocXem?> lượt</span>
        </div>
     </div>
        <div id="mota">
            <h3> Mô tả </h3>
            <?php echo $row->MoTa?>  
        </div>
        <div class="giohang" >
        	<a href="<?php echo base_url('cart/index')?>">
		        <img src="<?php echo img_url()?>/dathang.png" width="169"  align="right">
		    </a>
        </div>
<?php endforeach ?>
</div>