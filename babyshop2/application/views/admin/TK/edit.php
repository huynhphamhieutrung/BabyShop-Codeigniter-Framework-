<!-- head -->
<?php $this->load->view('admin/TK/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Thay đổi thông tin quản trị viên</h6>
		</div>
		
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên hiển thị:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('TenHienThi')?>" name="TenHienThi"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('TenHienThi')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Tên đăng nhập:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo set_value('TenDangNhap')?>" id="param_username" name="TenDangNhap"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('TenDangNhap')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Mật khẩu:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_password" name="MatKhau"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('MatKhau')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Nhập lại mật khẩu:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="password" _autocheck="true" id="param_re_password" name="re_password"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('re_password')?></div>
                	</div>
                	<div class="clear"></div>
                </div>


                <div class="formRow">
                	<label for="param_name" class="formLeft">Địa chỉ:<span class="req"></span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('DiaChi')?>" name="DiaChi"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('DiaChi')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

                <div class="formRow">
                	<label for="param_name" class="formLeft">Điện thoại:<span class="req"></span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="phone" _autocheck="true" id="param_name" value="<?php echo set_value('DienThoai')?>" name="DienThoai"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('DienThoai')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

                <div class="formRow">
                	<label for="param_name" class="formLeft">Email:<span class="req"></span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="email" _autocheck="true" id="param_name" value="<?php echo set_value('Email')?>" name="Email"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('Email')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>