<!-- head -->
<?php $this->load->view('admin/TK/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			
			<h6>Danh sách admin</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã tài khoản</td>
					<td>Tên đăng nhập</td>
                    <td>Tên hiển thị</td>
					<td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
					<td style="width:100px;">Thao tác</td>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($list as $row):?>
			<tr>
						
						<td class="textC"><?php echo $row->MaTaiKhoan?></td>

						<td>
						<span title="<?php echo $row->TenDangNhap?>" class="tipS">
							<?php echo $row->TenDangNhap?>				
						</span></td>

                        <td>
						<span title="<?php echo $row->TenHienThi?>" class="tipS">
							<?php echo $row->TenHienThi?>				
						</span></td>
						
						<td><span title="<?php echo $row->DiaChi?>" class="tipS">
							<?php echo $row->DiaChi?>					
						</span></td>
						
                        <td><span title="<?php echo $row->DienThoai?>" class="tipS">
							<?php echo $row->DienThoai?>					
						</span></td>

                        <td><span title="<?php echo $row->Email?>" class="tipS">
							<?php echo $row->Email?>					
						</span></td>
						
						<td class="option">
							<a href="<?php echo admin_url('TK/edit/'.$row->MaTaiKhoan)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('TK/delete/'.$row->MaTaiKhoan)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
