
<div class="box-center"><!-- The box-center product-->
             <div><h2>Đăng ký thành viên</h2>
		      </div>
		      <div class="box-content-center product"><!-- The box-content-center -->
		            <form class="t-form form_action" method="post" action="<?php echo site_url('user/register')?>" enctype="multipart/form-data">
						  
					
					<div class="form-row">
        						<label for="param_name" class="form-label">Tên đăng nhập:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="text" class="input" id="tendangnhap" name="tendangnhap" value="<?php echo set_value('tendangnhap')?>">
        							<div class="clear"></div>
        							<div class="error" id="name_error"><?php echo form_error('tendangnhap')?></div>
        						</div>
        						<div class="clear"></div>
						  </div>
						  

        				   
        				  <div class="form-row">
        						<label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="password" class="input" id="matkhau" name="matkhau">
        							<div class="clear"></div>
        							<div class="error" id="password_error"><?php echo form_error('matkhau')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  
        				  <div class="form-row">
        						<label for="param_re_password" class="form-label">Gõ lại mật khẩu:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="password" class="input" id="laimatkhau" name="laimatkhau">
        							<div class="clear"></div>
        							<div class="error" id="re_password_error"><?php echo form_error('laimatkhau')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  <div class="form-row">
        						<label for="param_name" class="form-label">Tên hiển thị:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="text" class="input" id="tenhienthi" name="tenhienthi" value="<?php echo set_value('tenhienthi')?>">
        							<div class="clear"></div>
        							<div class="error" id="name_error"><?php echo form_error('tenhienthi')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  <div class="form-row">
        						<label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="text" class="input" id="dienthoai" name="dienthoai" value="<?php echo set_value('dienthoai')?>">
        							<div class="clear"></div>
        							<div class="error" id="phone_error"><?php echo form_error('dienthoai')?></div>
        						</div>
        						<div class="clear"></div>
						  </div>
						  
						  <div class="form-row">
        						<label for="param_email" class="form-label">Email:<span class="req">*</span></label>
        						<div class="form-item">
        							<input type="text" class="input" id="email" name="email" value="<?php echo set_value('email')?>">
        							<div class="clear"></div>
        							<div class="error" id="email_error"><?php echo form_error('email')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  
        				  <div class="form-row">
        						<label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
        						<div class="form-item">
        							<textarea class="input" id="address" name="diachi"><?php echo set_value('diachi')?></textarea>
        							<div class="clear"></div>
        							<div class="error" id="address_error"><?php echo form_error('diachi')?></div>
        						</div>
        						<div class="clear"></div>
        				  </div>
        				  
        				  <div class="form-row">
        						<label class="form-label">&nbsp;</label>
        						<div class="form-item">
        				           	<input type="submit" class="button" value="Đăng ký" name="submit">
        						</div>
        				   </div>
                    </form>
		            <div class="clear"></div>
		      </div><!-- End box-content-center -->
		   
</div>
