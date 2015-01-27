
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\BootstrapAsset;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
mdm\admin\AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 May 2014 07:53:10 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Metro Lab</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
    <?= Html::csrfMetaTags() ?>
   <?php
		$this->registerCssFile("http://instagrambotlc.com/backend/assets/bootstrap/css/bootstrap.min.css");
   ?>
   <link href="/web/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   
   <link href="/web/backend/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="/web/backend/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="/web/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="/web/backend/css/style.css" rel="stylesheet" />
   <link href="/web/backend/css/style-responsive.css" rel="stylesheet" />
   <link href="/web/backend/css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="/web/backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="/web/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

   <link href="/web/backend/css/custom.css" rel="stylesheet" />


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
	   <!-- BEGIN TOP NAVIGATION BAR -->
	   <div class="navbar-inner">
		   <div class="container-fluid">
			   <!--BEGIN SIDEBAR TOGGLE-->
			   <div class="sidebar-toggle-box hidden-phone">
				   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			   </div>
			   <!--END SIDEBAR TOGGLE-->
			   <!-- BEGIN LOGO -->
			   <a class="brand" href="index-2.html">
				   <img src="/web/backend/img/logo.png" alt="Metro Lab" />
			   </a>
			   <!-- END LOGO -->
			   <!-- BEGIN RESPONSIVE MENU TOGGLER -->
			   <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
				   <span class="arrow"></span>
			   </a>
			   <!-- END RESPONSIVE MENU TOGGLER -->
			   <div id="top_menu" class="nav notify-row">
				   <!-- BEGIN NOTIFICATION -->
				   <ul class="nav top-menu">
					   <!-- BEGIN SETTINGS -->
					   <li class="dropdown">
						   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							   <i class="icon-tasks"></i>
							   <span class="badge badge-important">6</span>
						   </a>
						   <ul class="dropdown-menu extended tasks-bar">
							   <li>
								   <p>You have 6 pending tasks</p>
							   </li>
							   <li>
								   <a href="#">
									   <div class="task-info">
										 <div class="desc">Dashboard v1.3</div>
										 <div class="percent">44%</div>
									   </div>
									   <div class="progress progress-striped active no-margin-bot">
										   <div class="bar" style="width: 44%;"></div>
									   </div>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <div class="task-info">
										   <div class="desc">Database Update</div>
										   <div class="percent">65%</div>
									   </div>
									   <div class="progress progress-striped progress-success active no-margin-bot">
										   <div class="bar" style="width: 65%;"></div>
									   </div>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <div class="task-info">
										   <div class="desc">Iphone Development</div>
										   <div class="percent">87%</div>
									   </div>
									   <div class="progress progress-striped progress-info active no-margin-bot">
										   <div class="bar" style="width: 87%;"></div>
									   </div>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <div class="task-info">
										   <div class="desc">Mobile App</div>
										   <div class="percent">33%</div>
									   </div>
									   <div class="progress progress-striped progress-warning active no-margin-bot">
										   <div class="bar" style="width: 33%;"></div>
									   </div>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <div class="task-info">
										   <div class="desc">Dashboard v1.3</div>
										   <div class="percent">90%</div>
									   </div>
									   <div class="progress progress-striped progress-danger active no-margin-bot">
										   <div class="bar" style="width: 90%;"></div>
									   </div>
								   </a>
							   </li>
							   <li class="external">
								   <a href="#">See All Tasks</a>
							   </li>
						   </ul>
					   </li>
					   <!-- END SETTINGS -->
					   <!-- BEGIN INBOX DROPDOWN -->
					   <li class="dropdown" id="header_inbox_bar">
						   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							   <i class="icon-envelope-alt"></i>
							   <span class="badge badge-important">5</span>
						   </a>
						   <ul class="dropdown-menu extended inbox">
							   <li>
								   <p>You have 5 new messages</p>
							   </li>
							   <li>
								   <a href="#">
									   <span class="photo"><img src="/web/backend/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jonathan Smith</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
										Hello, this is an example msg.
									</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="photo"><img src="/web/backend/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jhon Doe</span>
									<span class="time">10 mins</span>
									</span>
									<span class="message">
									 Hi, Jhon Doe Bhai how are you ?
									</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="photo"><img src="/web/backend/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jason Stathum</span>
									<span class="time">3 hrs</span>
									</span>
									<span class="message">
										This is awesome dashboard.
									</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="photo"><img src="/web/backend/img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Jondi Rose</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
										Hello, this is metrolab
									</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">See all messages</a>
							   </li>
						   </ul>
					   </li>
					   <!-- END INBOX DROPDOWN -->
					   <!-- BEGIN NOTIFICATION DROPDOWN -->
					   <li class="dropdown" id="header_notification_bar">
						   <a href="#" class="dropdown-toggle" data-toggle="dropdown">

							   <i class="icon-bell-alt"></i>
							   <span class="badge badge-warning">7</span>
						   </a>
						   <ul class="dropdown-menu extended notification">
							   <li>
								   <p>You have 7 new notifications</p>
							   </li>
							   <li>
								   <a href="#">
									   <span class="label label-important"><i class="icon-bolt"></i></span>
									   Server #3 overloaded.
									   <span class="small italic">34 mins</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="label label-warning"><i class="icon-bell"></i></span>
									   Server #10 not respoding.
									   <span class="small italic">1 Hours</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="label label-important"><i class="icon-bolt"></i></span>
									   Database overloaded 24%.
									   <span class="small italic">4 hrs</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="label label-success"><i class="icon-plus"></i></span>
									   New user registered.
									   <span class="small italic">Just now</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">
									   <span class="label label-info"><i class="icon-bullhorn"></i></span>
									   Application error.
									   <span class="small italic">10 mins</span>
								   </a>
							   </li>
							   <li>
								   <a href="#">See all notifications</a>
							   </li>
						   </ul>
					   </li>
					   <!-- END NOTIFICATION DROPDOWN -->

				   </ul>
			   </div>
			   <!-- END  NOTIFICATION -->
			   <div class="top-nav ">
				   <ul class="nav pull-right top-menu" >
					   <!-- BEGIN SUPPORT -->
					   <li class="dropdown mtop5">

						   <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
							   <i class="icon-comments-alt"></i>
						   </a>
					   </li>
					   <li class="dropdown mtop5">
						   <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
							   <i class="icon-headphones"></i>
						   </a>
					   </li>
					   <!-- END SUPPORT -->
					   <!-- BEGIN USER LOGIN DROPDOWN -->
					   <li class="dropdown">
						   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							   <img src="/web/backend/img/avatar1_small.jpg" alt="">
							   <span class="username">
									<?php 
										if (!\Yii::$app->user->isGuest) {
											echo \Yii::$app->user->identity->email;
										}
									?>
							   </span>
							   <b class="caret"></b>
						   </a>
						   <ul class="dropdown-menu extended logout">
							   <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
							   <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
							   <li><a href="/site/logout"  data-method="post"><i class="icon-key"></i> Log Out</a></li>
						   </ul>
					   </li>
					   <!-- END USER LOGIN DROPDOWN -->
				   </ul>
				   <!-- END TOP NAVIGATION MENU -->
			   </div>
		   </div>
	   </div>
	   <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
	  <!-- BEGIN SIDEBAR -->
	  <div class="sidebar-scroll">
		<div id="sidebar" class="nav-collapse collapse">

		 <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
		 <div class="navbar-inverse">
			<form class="navbar-search visible-phone">
			   <input type="text" class="search-query" placeholder="Search" />
			</form>
		 </div>
		 <!-- END RESPONSIVE QUICK SEARCH FORM -->
		 <!-- BEGIN SIDEBAR MENU -->
		 <?php
			//$this->renderPartial('sidebar');

		 ?>
			<ul class="sidebar-menu">
				<li class="sub-menu active">
					<a class="" href="index-2.html">
						<i class="icon-dashboard"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sub-menu open">
					<a href="javascript:;" class="">
						<i class="icon-user"></i>
						<span>Authorization</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub" style="">
						<li><a class="" href="/admin/assignment">Assignment</a></li>
						<li><a class="" href="/admin/role">Roles</a></li>
                        <li><a class="" href="/admin/permission">Permissions</a></li>
                        <li><a class="" href="/admin/route">Routes</a></li>
                        <li><a class="" href="/admin/rule">Rules</a></li>
                        <li><a class="" href="/admin/menu">Menus</a></li>
					</ul>
				</li>
			</ul>
		 <!-- END SIDEBAR MENU -->
	  </div>
	  </div>
	  <!-- END SIDEBAR -->
	  <!-- BEGIN PAGE -->  
	  <div id="main-content">
		 <!-- BEGIN PAGE CONTAINER-->
		 <div class="container-fluid">
			<!-- BEGIN PAGE HEADER-->   
			<div class="row-fluid">
			   <div class="span12">
				   <!-- BEGIN THEME CUSTOMIZER-->
				   <div id="theme-change" class="hidden-phone">
					   <i class="icon-cogs"></i>
						<span class="settings">
							<span class="text">Theme Color:</span>
							<span class="colors">
								<span class="color-default" data-style="default"></span>
								<span class="color-green" data-style="green"></span>
								<span class="color-gray" data-style="gray"></span>
								<span class="color-purple" data-style="purple"></span>
								<span class="color-red" data-style="red"></span>
							</span>
						</span>
				   </div>
				   <!-- END THEME CUSTOMIZER-->
				  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
				   <h3 class="page-title">
					 Dashboard
				   </h3>
				    <?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
				   <!-- END PAGE TITLE & BREADCRUMB-->
			   </div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="main-container">
				<?php echo $content; ?>
			</div>
			<!-- END PAGE CONTENT-->         
		 </div>
		 <!-- END PAGE CONTAINER-->
	  </div>
	  <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
	   2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="/web/backend/js/jquery-1.8.3.min.js"></script>
   <script src="/web/backend/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="/web/backend/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="/web/backend/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="/web/backend/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="/web/backend/assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="/web/backend/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="/web/backend/js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="/web/backend/assets/chart-master/Chart.js"></script>
   <script src="/web/backend/js/jquery.scrollTo.min.js"></script>
   <!--common script for all pages-->
   <script src="/web/backend/js/common-scripts.js"></script>

   <!-- END JAVASCRIPTS -->   
   <?php $this->endBody() ?>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 May 2014 07:53:53 GMT -->
</html>
<?php $this->endPage() ?>   