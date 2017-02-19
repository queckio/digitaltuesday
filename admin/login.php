<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['submit'])){
		/* Define username and associated password array */
		$logins = array('oliver@queck.io' => 'dtAdmin442017');
		
		/* Check and assign submitted Username and Password to new variable */
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$username]) && $logins[$username] == $password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['username']=$logins[$username];
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Digital Tuesday</title>
		<!-- Mobile Meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
					
		<!-- Font Awesome CSS -->
		<link href="/css/font-awesome/font-awesome.min.css" rel="stylesheet">
		
		<!-- Simple Line Icons -->
		<link href="/css/simple-line-icons/simple-line-icons.css" rel="stylesheet">
		
		<!-- Bootstrap main CSS -->
		<link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
			
		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		
		<!-- yamm3 -->
		<link href="/css/yamm.css" rel="stylesheet">
			
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="/plugins/rs-plugin/css/settings.css" media="screen" />
		
		<!-- Animate -->
		<link href="/css/animate/animate.min.css" rel="stylesheet">
		
		<!-- owl-carousel -->
		<link href="/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
		
		<!-- magnific-popup -->
		<link href="/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		
		<!-- flexslider -->
		<link href="/plugins/flexslider/flexslider.css" rel="stylesheet">
		
		<!-- morris -->
		<link href="/plugins/morris/morris.css" rel="stylesheet">
		
		<!-- Hover -->
		<link href="/css/hover/hover.min.css" rel="stylesheet">
		
		<!-- prettify  -->
		<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>		
		<link href="/css/prettify/prettify.css" rel="stylesheet">
		
		<!-- style -->
		<link href="/css/style.css" rel="stylesheet">
		
		<!-- switcher -->
		<link href="/switcher/switcher.css" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="/css/colors/blue.css" id="colors">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
    
	<body class="wide">
    	
		<!-- wrapper -->
		<div class="wrapper">
		
			<!-- Preloader -->
			<div id="preloader">
				<div id="status">&nbsp;</div>
			</div>
			<!-- //Preloader -->

			<!-- header -->
			<header id="header">
		
				<nav class="navbar navbar-onepage navbar-fixed-top has-bg">
				  <div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <a class="navbar-brand" href="/index.html">DT 04.04.2017</a>
					</div>
				</nav>
			
			</header>
			<!-- /header -->

			<!-- interaction -->	
			<section class="padd-tb-150">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">	
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Admin Login</h3>
								</div>
								<div class="panel-body">								
									<form action="" method="post" name="loginForm">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="username" />
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" name="password" />
										</div>
										<div class="padd-t-20">
											<input type="submit" name="submit" class="btn btn-theme btn-lg btn-block" value="Submit" />
										</div>
									</form>
                				</div>
							</div>
						</div>
					</div><!-- ./row -->
				</div><!-- ./container -->
			</section>
			<!-- ./interaction -->

			<!-- footer-sub -->
			<div class="footer-sub bg-light-dark padd-tb-10">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="copyright">
								&copy; 2017 Oliver Queck, theme by  <a href="/http://www.bootstrapwizard.info">Bootstrapwizard</a>
							</div>
						</div>
						<div class="col-md-6">
							<ul class="list-inline pull-right">
								<li><a traget="_blank" href="https://www.facebook.com/oliver.queck"" class="icon-holder small circle"><i class="fa fa-facebook"></i></a></li>
								<li><a traget="_blank" href="https://www.xing.com/profile/Oliver_Queck2" class="icon-holder small circle"><i class="fa fa-xing"></i></a></li>
								<li><a traget="_blank" href="https://de.linkedin.com/in/oliverqueck" class="icon-holder small circle"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="mailto:oliver@queck.io" class="icon-holder envelope small circle"><i class="fa fa-envelope"></i>
								</a></li>
							</ul>
						</div>	
					</div><!-- ./row -->
				</div><!-- ./container -->
			</div>
			<!-- ./footer-sub -->			
		</div>
		<!-- //wrapper -->
					
		<!-- jquery -->
		<script src="/js/jquery-1.11.3.min.js"></script>	
		<script src="/js/bootstrap.min.js"></script>
	
		<!-- morris -->	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
		<script type="text/javascript" src="/plugins/morris/morris.min.js"></script>  
		
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script type="text/javascript" src="/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>  
		<script type="text/javascript" src="/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
		<!-- validator  -->
		<script type="text/javascript" src="/plugins/validator/validator.min.js"></script> 
		<script type="text/javascript" src="/plugins/validator/form-scripts.js"></script> 
			
		<!-- magnific-popup -->
		<script type="text/javascript" src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		
		<!-- owl-carousel -->
		<script type="text/javascript" src="/plugins/owl-carousel/owl.carousel.min.js"></script>
		
		<!-- wow -->
		<script type="text/javascript" src="/plugins/wow/wow.js"></script>
		
		<!-- appear -->
		<script type="text/javascript" src="/plugins/appear/jquery.appear.js"></script>
		
		<!-- waypoints -->
		<script type="text/javascript" src="/plugins/waypoints/jquery.waypoints.min.js"></script>
				
		<!-- counter-up -->
		<script type="text/javascript" src="/plugins/counterup/jquery.counterup.min.js"></script>
		
		<!-- countdown -->
		<script type="text/javascript" src="/plugins/countdown/jquery.countdown.min.js"></script> 
		
		<!-- smooth-scroll -->
		<script type="text/javascript" src="/plugins/smooth-scroll/smooth-scroll.js"></script> 
		
		<!-- flexslider -->
		<script type="text/javascript" src="/plugins/flexslider/jquery.flexslider-min.js"></script> 
		
		<!-- switcher -->
		<script type="text/javascript" src="/switcher/switcher.js"></script> 
		
		<!-- main -->		
		<script src="/js/main.js"></script>
	</body>
</html>