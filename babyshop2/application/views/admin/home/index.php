<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>

<div class="line"></div>

<div class="wrapper">
	
	<div class="widgets">
	     <!-- Stats -->
		
<!-- Amount -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/money.png">
			<h6>Doanh số</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
			<tbody>
				
					<tr>
							<td class="fontB blue f13">Tổng doanh số</td>
							<td style="width:120px;" class="textR webStatsLink red">999,999,999 đ</td>
					</tr>
				    
				    <tr>
							<td class="fontB blue f13">Doanh số hôm nay</td>
							<td style="width:120px;" class="textR webStatsLink red">0 đ</td>
					</tr>
					
				    <tr>
							<td class="fontB blue f13">Doanh số theo tháng</td>
							<td style="width:120px;" class="textR webStatsLink red">
							0 đ
							</td>
					</tr>
				    
			</tbody>
		</table>
	</div>
</div>


<!-- User -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/users.png">
			<h6>Thống kê dữ liệu</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
			<tbody>
				
				<tr>
					<td>
						<div class="left">Tổng số gia dịch</div>
						<div class="right f11"><a href="admin/tran.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						6					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số sản phẩm</div>
						<div class="right f11"><a href="admin/product.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						14					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số thành viên</div>
						<div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						2					</td>
				</tr>
				<tr>
					<td>
						<div class="left">Tổng số liên hệ</div>
						<div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						0					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

		<div class="clear"></div>
		
		<!-- Giao dich thanh cong gan day nhat -->
		
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;"></span></div></span>
			<h6>Danh sách Giao dịch</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			
		<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td style="width:60px;">Mã hóa đơn</td>
					<td style="width:90px;">Mã khách hàng</td>
					<td style="width:175px;">Ngày lập</td>
					<td>TÌnh trạng</td>
					<td style="width:100px;">Tổng tiền</td>
					<td style="width:55px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB"  url="<?php echo admin_url('dondathang/delete_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               &nbsp;<strong>1</strong>&nbsp;<a href="admin/tran/index/10">2</a>&nbsp;<a href="admin/tran/index/10">Trang kế tiếp</a>&nbsp;			            </div>
					</td>
				</tr>
			</tfoot>

					<tbody>
					<?php foreach ($list as $row):?>
					<tr class="row_<?php echo $row->MaDonDatHang?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $row->MaDonDatHang?>" /></td>
						
						<td class="textC"><?php echo $row->MaDonDatHang?></td>
                        
						<td>
						<span title="<?php echo $row->MaTaiKhoan?>" class="tipS">
							<?php echo $row->MaTaiKhoan?>				
						</span>
						</td>

						<td>
						<span title="<?php echo $row->NgayLap?>" class="tipS">
							<?php echo $row->NgayLap?>				
						</span>
						</td>

						<td>
						<span title="<?php echo $row->MaTinhTrang?>" class="tipS">
							<?php echo $row->MaTinhTrang?>
						</span>
						</td>

						<td>
						<span title="<?php echo $row->TongThanhTien?>" class="tipS">
							<?php echo $row->TongThanhTien?>
						</span>
						</td>
						
						<td class="option">
					
						 <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('#')?>">
							<img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
            
                        </a>

							<a title="Xem chi tiết sản phẩm" class="tipS" target="_blank" href="sanpham/view/9.html">
								<img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
						 </a>
							
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
			
		</table>
	
</div>


<div class="clear mt30"></div>

