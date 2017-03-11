<nav class="navbar navbar-tabs navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url();?>" class="nav navbar-brand">Tiện ích Green Stars</a>
    </div>     
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">            
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Thực phẩm - Đồ uống <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url("thuc-pham-kho/");?>">Thực phẩm khô</a></li>
              <li><a href="<?php echo base_url("hai-san/");?>">Hải sản</a></li>
              <li><a href="<?php echo base_url("thit/");?>">Thịt các loại</a></li>
              <li><a href="<?php echo base_url("do-an-san/");?>">Đồ ăn sẵn</a></li>
              <li><a href="<?php echo base_url("thuc-pham-khac/");?>">Đồ ăn vặt, hoa quả, khác</a></li>
              <li><a href="<?php echo base_url("do-uong/");?>">Đồ uống</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Dịch vụ <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url("tien-ich/");?>">Tiện ích</a></li>
              <li><a href="<?php echo base_url("di-lai/");?>">Đi lại</a></li>
              <li><a href="<?php echo base_url("giao-duc/");?>">Giáo dục</a></li>
              <li><a href="<?php echo base_url("y-te/");?>">Y tế</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tiêu dùng <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url("hang-tieu-dung/");?>">Hàng tiêu dùng</a></li>
              <li><a href="<?php echo base_url("my-pham-lam-dep/");?>">Mỹ phẩm và làm đẹp</a></li>
              <li><a href="<?php echo base_url("thoi-trang/");?>">Thời trang</a></li>
              <li><a href="<?php echo base_url("noi-that/");?>">Nội thất</a></li>
              <li><a href="<?php echo base_url("khac/");?>">Khác</a></li>  
            </ul>
          </li>
        </ul>
        <?php
          $login = $this->session->userdata('G1Kpmvg9j0fZJ447NiOT');
          if (isset($login) || $login === TRUE):
        ?>
          <button class="btn btn-primary navbar-btn" onclick="window.location.href='<?php echo base_url("add/");?>'">Thêm mới</button>
        <?php endif; ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="https://www.facebook.com/" target="_blank"><span class="glyphicon glyphicon-bookmark"></span>Cộng đồng cư dân</a></li>
            <li>
              <?php                
                if(!$login || $login === FALSE) {
                  echo '<a href="'. base_url('login/') .'">Đăng nhập</a>';
                } else {
                  echo '<span class="navbar-text">'.$this->session->userdata('WwmKlmIIN9Tl0zDK4zIW').'</span>';
                }
              ?>
            </li>
            
        </ul>
    </div>
</div>
</nav>