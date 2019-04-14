<!-- head -->
<?php $this->load->view('admin/dondathang/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data);?>
    
	<div id="rightSide">
	 
<!-- Main content wrapper -->
<div class="wrapper">

	<div class="widget">
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách Giao dịch</h6>
		 	<div class="num f12">Tổng số: <b>15</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="index.php/admin/tran.html" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
							<td class="label" style="width:60px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:95px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_type">Hình thức</label></td>
							<td class="item">
								<select name="payment">
									<option value=""></option>
									<option value='dathang' >Đặt hàng</option>
								</select>
							</td>
							
							<td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
							<td class="item"><input name="created" value="" id="filter_created" type="text" class="datepicker" /></td>

							
							<td colspan='2' style='width:60px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/tran.html'; ">
							</td>
							
						</tr>
						
						<tr>
						    <td class="label" style="width:60px;"><label for="filter_user">Thành viên</label></td>
							<td class="item"><input name="user" value="" id="filter_user" class="tipS" title="Nhập mã thành viên" type="text" /></td>

							<td class="label"><label for="filter_status">Giao dịch</label></td>
							<td class="item">
								<select name="status">
									<option></option>
									<option value='0' >Đợi xử lý</option>
									<option value='1' >Thành công</option>
									<option value='2' >Hủy bỏ</option>
								</select>
							</td>

							<td class="label"><label for="filter_created_to">Đến ngày</label></td>
							<td class="item"><input name="created_to" value="" id="filter_created_to" type="text" class="datepicker" /></td>

							<td class="label"></td>
							<td class="item"></td>
						</tr>
						
					</tbody></table>
				</form>
			</td></tr></thead>
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
	
</div>

        	
		

<div class="clear mt30"></div>
