<!DOCTYPE html>
<html>
<head>
<title>CodeIgniter</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- banner-body -->
		<div class="banner-body">
		<div class="container">
		
<!-- header -->
			<div class="header">
				<div class="header-nav" >
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						   <a class="navbar-brand" href="index.html"><span>C</span>odeIgniter Blog</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
                         
							 <li><a href="<?php echo base_url();?>welcome/index" accesskey="1" title="">Blog</a></li>
               
                <?php
                $user_id=$this->session->userdata('user_id');
                if ($user_id!=null) {
                    
                
                ?>
                
                <li><a href="<?php echo base_url();?>blogger/profile" accesskey="3" title="">Profile</a></li>
                <li><a href="<?php echo base_url();?>blogger/add_blog" accesskey="4" title="">Add Blog</a></li>
                 <li><a href="<?php echo base_url();?>blogger/my_blogs" accesskey="4" title="">MY Blog</a></li>
                <li><a href="<?php echo base_url();?>blogger/logout" accesskey="4" title="">Log Out</a></li>
                <?php }
                     else {?>
                <li><a href="<?php echo base_url();?>login/sign_up" accesskey="5" title="">Sign_up</a></li>
                <li><a href="<?php echo base_url();?>login/user_login" accesskey="5" title="">Login</a></li>
                     <?php }?>
							</ul>
							<div class="header-bottom-top">
			<ul>
				<li><a href="#" class="g"> </a></li>
				<li><a href="#" class="p"> </a></li>
				<li><a href="#" class="facebook"> </a></li>
				<li><a href="#" class="twitter"> </a></li>
			</ul>
		</div>
							</div>
						</div><!-- /.navbar-collapse -->

					</nav>
				
	</div>
			<!-- search-scripts -->
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			
			
			
			

<!-- //header -->
<!-- header-bottom -->
	
		


	<div class="clearfix"> </div>
<!-- banner -->
		   
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
<!-- footer -->
</div>

	
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
	</div>
</div>
</div>
		<div class="footer-bottom">
		
			<p>© 2016 CodeIgniterBlog. All rights reserved | Design by <a href="http://kbcon.com.ar/" target="_blank"> Karen B. Consoli</a></p>
	
	</div>
	
<!-- //for bootstrap working -->
</body>
</html>


