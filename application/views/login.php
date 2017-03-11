<!DOCTYPE html>
<html lang="vi">
<head>
	<?php $this->load->view('templates/head'); ?>
</head>
<body>

	<div class="container">	
	    <div class="modal-dialog modal-sm">
	    	<div class="modal-content">
		        <div class="modal-header">
		        	<h4 class="modal-title">Đăng nhập</h4>
		        </div>
		        <div class="modal-body">
		        	<?php 
						$message = $this->session->flashdata('message');
						$type_message = $this->session->flashdata('type_message');
						if (isset($message) && isset($type_message) && $message): ?>
						<div class="alert alert-<?php echo $type_message; ?>">
					        <strong>Thông báo: </strong><?php echo $message; ?>
					    </div>
					<?php endif; ?>
		        	<form class="" action="" method="post">
		                <div class="form-group">
		                    <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn">
		                    <small><?php echo form_error('email');?></small>
		                </div>
		                
		                <div class="form-group">
		                    <input type="submit" value="Tiếp tục" class="btn btn-primary">
		                    <a href="<?php echo base_url();?>" class="btn btn-default pull-right">Về trang chủ</a>
		                </div>
			        </form>
		      	</div>		        
		        <div class="modal-footer">
        			<a href="#">Liên hệ</a>
      			</div>
	        </div>
	    </div>	    
	</div>
	<footer>
		<?php $this->load->view('templates/footer.php'); ?>
	</footer>
</body>
</html>