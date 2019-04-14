<div id="quanlygiohang">
    <h1>Quản lý giỏ hàng</h1>
    <?php if($total_items > 0):?>
    <table>
    	<tbody>
            <tr>
        	    <th width="20">STT</th>
                <th>Tên sản phẩm</th>
                <th width="60">Hình</th>
                <th width="50">Giá</th>
                <th width="50">Số lượng</th>
                <th width="50">Xóa</th>
            </tr>
            <?php foreach ($carts as $row):
                $i = 1?>
            <tr>  
    	        <td><?php echo $i?></td>
    			<td><?php echo $row['TenSanPham'];?></td>
    			<td align="center">
                    <img src="<?php echo images_url()?>/<?php echo $row->HinhURL?>" width="50">
    			</td>
    			<td><?php echo number_format($row['price']);?> VNĐ</td>
    		    <td>
                    <input name="qty_<?php echo $row['id']?>" value="<?php echo $row['qty'];?>" size="5"/>
                </td>
                <td>
                    <?php echo number_format($row['subtotal']);?>đ
                </td>
                <td><a href="<?php echo base_url('cart/del/'.$row['id'])?>">Xóa</a></td>
                <?php $i++ ?>
            </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="5">Tổng số tiền thanh toán: <b style="color:red"><?php echo number_format($total_amount)?>đ</b>
                <a href="<?php echo base_url('cart/del')?>">Xóa toàn bộ</a>
                </td>
            </tr>
            <tr>
                <td colspan="5"><button type="submit">Cập nhât</button>
                <a href="<?php echo site_url('order/checkout')?>" class="button">Mua hàng</a>
                </td>
            </tr>
        </tbody></table>
        <?php else:?>
           <h4>Không có sản phẩm nào trong giỏ hàng</h4>
        <?php endif;?>
</div>