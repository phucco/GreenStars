<h3>Thay đổi thông tin Sản phẩm - Dịch vụ</h3>
<hr>
<form action="" method="post" class="form-horizontal">
	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	<div class="form-group">
		<label class="control-label col-md-4" for="category">Danh mục:</label>
		<div class="col-md-6">
			<select class="form-control" id="category" name="category_id">
			    <option value="1">Tiện ích</option>
			    <option value="2">Đi lại</option>
			    <option value="3">Giáo dục</option>
			    <option value="4">Y tế</option>
			    <option value="5">Thực phẩm khô</option>
			    <option value="6">Hải sản</option>
			    <option value="7">Thịt các loại</option>
			    <option value="8">Đồ ăn sẵn</option>
			    <option value="9">Đồ ăn vặt, hoa quả, thực phẩm khác</option>
			    <option value="10">Đồ uống</option>
			    <option value="11">Hàng tiêu dùng</option>
			    <option value="12">Mỹ phẩm và làm đẹp</option>
			    <option value="13">Thời trang</option>
			    <option value="14">Nội thất</option>
			    <option value="15">Khác</option>
		  	</select>
	  	</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="name">Sản phẩm - Dịch vụ:</label>
		<div class="col-md-6">
  			<input type="text" class="form-control" id="name" name="name" value="<?php echo $info->name; ?>">
  		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="room">Số phòng:</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="room" name="room" value="<?php echo $info->room; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="building">Tòa:</label>
		<div class="col-md-6">
			<label class="radio-inline control-label"><input type="radio" name="building" value="A1">A1</label>
			<label class="radio-inline"><input type="radio" name="building" value="A2">A2</label>
			<label class="radio-inline"><input type="radio" name="building" value="A3">A3</label>
			<label class="radio-inline"><input type="radio" name="building" value="B4">B4</label>
			<label class="radio-inline"><input type="radio" name="building" value="B5">B5</label>
			<label class="radio-inline"><input type="radio" name="building" value="B6">B6</label>
			<label class="radio-inline"><input type="radio" name="building" value="B7">B7</label>
		</div>
		<br>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="phone">Số điện thoại (không bắt buộc):</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="phone" placeholder="Chỉ chứa 10 hoặc 11 chữ số, không chứa khoảng trắng" name="phone" value="<?php echo $info->phone; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="fb_name">Tên Facebook (không bắt buộc):</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="fb_name" name="fb_name" value="<?php echo $info->fb_name; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="fb_link">Link Facebook (không bắt buộc):</label>
		<div class="col-md-6">
			<input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Bắt đầu bằng https://facebook.com/..." value="<?php echo $info->fb_link; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-4" for="note">Ghi chú (không bắt buộc):</label>
		<div class="col-md-6">
			<textarea name="note" class="form-control" rows="3"><?php echo $info->note; ?></textarea>
		</div>
	</div>
	<input type="submit" class="btn btn-primary col-md-offset-4" name="btn_submit" value="Thêm mới">
	<a href="<?php echo base_url();?>" class="btn btn-default">Hủy bỏ</a>
</form>