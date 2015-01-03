<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 20/11/2014
 * Time: 10:32 PM
 */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{ site_config('site_header')}}</title>
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="shortcut icon" href="/public/favicon.ico"/>
	<!-- bootstrap framework -->
	<link href="/public/template/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- custom icons -->
		<!-- font awesome icons -->
		<link href="/public/template/assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
		<!-- ionicons -->
		<link href="/public/template/assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen">
	<!-- page specific stylesheets -->
	<!-- nvd3 charts -->
	<link rel="stylesheet" href="/public/template/assets/lib/novus-nvd3/nv.d3.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="/public/template/assets/lib/owl-carousel/owl.carousel.css">
	<!-- main stylesheet -->
	<link href="/public/template/assets/css/style.css" rel="stylesheet" media="screen">

	<link href="/public/css/admin.css" rel="stylesheet" media="screen">
	<!-- google webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'>
	<!-- moment.js (date library) -->
	<script src="/public/template/assets/lib/moment-js/moment.min.js"></script>
</head>
<body>
	<!-- top bar -->
	<header class="navbar navbar-fixed-top" role="banner">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="{{URL::to('/')}}" class="navbar-brand">
					{{site_config('site_name')}}
				</a>
			</div>
			<ul class="top_links">
				<li>
					<a href="tasks_summary.html"><span>23</span>Tasks</a>
				</li>
				<li>
					<a href="mail_inbox.html"><span>8</span>Mails</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">

				<li><a href="{{URL::to('config')}}"><span class="navbar_el_icon ion-ios7-gear"></span> <span
								class="navbar_el_title">Settings</span></a></li>
				<li><a href="#"><span class="navbar_el_icon ion-help-buoy"></span> <span class="navbar_el_title">Help</span></a></li>
				<li class="user_menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="navbar_el_icon ion-person"></span> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ URL::to('profile') }}">Profile</a></li>
						<!-- <li><a href="mail_inbox.html">My messages</a></li>
						<li><a href="tasks_summary.html">My tasks</a></li>
						<li class="divider"></li> -->
						<li><a href="{{URL::to("/logout")}}">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</header>