<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/head'); ?>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=427586007576522";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header>
		<?php $this->load->view('templates/navbar'); ?>
	</header>
	<div class="row">
		<div class="container">
			<?php if (isset($message) && isset($type_message) && $message): ?>
				<div class="alert alert-<?php echo $type_message;?>">
			        <strong>Thông báo: </strong><?php echo $message; ?>
			    </div>
			<?php endif; ?>
			<?php $this->load->view($temp, $this->data); ?>
		</div>
	</div>
	<div class="row">
		<div class="container">			
			<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="1140" data-numposts="10"></div>
		</div>
	</div>
	<footer>
		<?php $this->load->view('templates/footer'); ?>
	</footer>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-91917896-1', 'auto');
      ga('send', 'pageview');
    
    </script>
</body>
</html>