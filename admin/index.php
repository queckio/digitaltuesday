<?php 
	session_start(); /* Starts the session */

	if(!isset($_SESSION['UserData']['username'])){
		header("location:login.php");
		exit;
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
		<!-- <link rel="stylesheet" type="text/css" href="/plugins/dynatable/jquery.dynatable.css"> -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/datatables.min.css"/>
  
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
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="index.php">DT 04.04.2017</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">				 
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">logout</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			
			</header>
			<!-- /header -->

			<!-- interaction -->	
			<section class="padd-t-90 padd-b-20">
				<div class="container">
				
					<div class="heading text-center padd-b-10 wow fadeIn">
						<h2><strong>Admin Section</strong></h2>
						<div class="separator center"></div>
						
					</div>
					<div class="row wow fadeInUp">
						<div class="ccol-md-3 col-sm-3">
							<div class="feature-box4 padd-10 text-center">
								<i class="icon icon-bubbles"></i>
								<h4>Questions</h4>	
								<button id="getQuestions" class="btn btn-blue btn-sm" type="button"><b>Get questions</b></button>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="feature-box4 padd-10 text-center">
								<i class="icon icon-speedometer"></i>
								<h4>Warm-up: Yes or No?</h4>	
								<button id="getResultYesNo" class="btn btn-blue btn-sm" type="button"><b>Get result</b></button>
							</div>
						</div>
						<div class="ccol-md-3 col-sm-3">
							<div class="feature-box4 padd-10 text-center">
								<i class="icon icon-trophy"></i>
								<h4>Magic</h4>	
								<button id="getResultPQ" class="btn btn-blue btn-sm" type="button"><b>Get result</b></button>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="feature-box4 padd-10 text-center">
								<i class="icon icon-compass"></i>
								<h4>Feedback</h4>	
								<button id="getResultFeedback" class="btn btn-blue btn-sm" type="button"><b>Get feedback</b></button>
							</div>
						</div>
					</div>
				</div><!-- ./container -->
			</section><!-- ./interaction -->

			<hr id="resultSeparator">

			<section id="resultYesNo" class="padd-b-120">
				<div class="container">
					<div id="yesNo" class="row wow fadeInUp">
						<h1 id="resultYesNoText" class="text-center"></h1>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="feature-box4 padd-10 text-center">
								<p class="btn btn-green btn-lg">
									<i class="fa fa-thumbs-up" style="color: #fff"></i>
									<h1 id="resultYes" class="text-center"></h1>
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="feature-box4 padd-10 text-center">
								<p class="btn btn-red btn-lg">
									<i class="fa fa-thumbs-down" style="color: #fff"></i>
									<h1 id="resultNo" class="text-center"></h1>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="resultFeedback" class="padd-b-120">
				<div class="container">
					<div id="feedback" class="row wow fadeInUp">
						<h1 id="resultFeedbackText" class="text-center"></h1>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="feature-box4 padd-10 text-center">
								<p class="btn btn-green btn-lg">
									<i class="fa fa-thumbs-up" style="color: #fff"></i>
									<h1 id="resultGood" class="text-center"></h1>
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="feature-box4 padd-10 text-center">
								<p class="btn btn-red btn-lg">
									<i class="fa fa-thumbs-down" style="color: #fff"></i>
									<h1 id="resultBad" class="text-center"></h1>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="resultQuestions" class="padd-b-120 padd-lr-60">
				<div class="container">
					<table id="questionsTable" class="display">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Question</th>						 
					</table>
				</div>
			</section>

			<section id="resultPQ" class="padd-b-120 padd-lr-60">
				<div class"container">
					<table id="pqTable" class"display">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Score</th>						 
							<th>Time</th>						 
					</table>
				</div>
			</section>

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
								<li><a traget="_blank" href="https://www.facebook.com/oliver.queck" class="icon-holder small circle"><i class="fa fa-facebook"></i></a></li>
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
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>	
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/datatables.min.js"></script>
		<!-- <script type="text/javascript" src="/plugins/dynatable/jquery.dynatable.js"></script> -->

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
		<script type="text/javascript" src="js/dt-admin.js"></script>

	</body>
</html>