<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url();?>assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?= @$title; ?></title>

		<!-- disable cashing -->
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="0">

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?=base_url();?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?=base_url();?>assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="<?=base_url();?>assets/css/demo.css" rel="stylesheet" /> -->

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url();?>assets/css/themify-icons.css" rel="stylesheet">

		<!-- this for tables style -->
		<link rel="stylesheet" href="<?=base_url();?>assets/css/table.css">

		<!-- this for borsa page -->
		<link rel="stylesheet" href="<?=base_url();?>assets/css/borsa.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/w3.css">

		<!--   Core JS Files   -->
		<script src="<?=base_url();?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- this is doc // https://clipboardjs.com/ -->
		<script src="<?=base_url();?>assets/js/clipboard.min.js" type="text/javascript"></script>

		<style media="screen">
			.row1{
				background-color: #<?=@$colors->offer;?>;
				color: #<?=@$colors->offer_b;?>;
				/* font-weight: bold;
				font-size: 16px; */
			}

			.row2{
				background-color: #<?=@$colors->rent;?>;
				color: #<?=@$colors->rent_b;?>;
				/* font-weight: bold;
				font-size: 16px; */
			}

			.row3{
				background-color: #<?=@$colors->request;?>;
				color: #<?=@$colors->request_b;?>;
				/* font-weight: bold;
				font-size: 16px; */
			}

			.selected {
					 background: #000000;
					 color: #FFFFFF;
			 }
		</style>

</head>
<body>

	<noscript>
		<center><strong>عفوا لن يعمل معك الموقع بالشكل الصحيح حتى تفعل الجافا سكريبت</strong></center>
		<style>
		 	.wrapper , marquee , .custom-menu , .popup_form
			{ display:none; }
	 	</style>
	</noscript>

<!-- <marquee id="news_bar" behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();"></marquee> -->
<?php

	$result = $this->login_model->get_news_sttings()->result()[0];
	$type = $result->type;
	$speed = $result->speed;
	$direction = $result->direction;
	$limit_rows = $result->limit_rows;

	$dir = "right";
	if($direction == 1)
		$dir = "right";
	else
		$dir = "left";

	echo "<marquee  behavior='scroll' scrollamount='$speed' direction='$dir' onmouseover='this.stop();' onmouseout='this.start();'>";
	$real_eastes = $this->login_model->get_real_data($result)->result();
	foreach ($real_eastes as $key => $value) {

		$request_type = "معروض";
		if($value->request_type == 1)
			$request_type = "معروض";
		else if($value->request_type == 2)
			$request_type = "مطلوب";
		else if($value->request_type == 3)
			$request_type = "للايجار";

		echo "<a target='_blank'  href='".base_url() . "real_estate?id=". $value->id ."'><span style='color:red'> $request_type </span> $value->type_name - اسم المخطط :   $value->planned  - بسعر : $value->price - تفاصيل : $value->note </a> | ";
	}
	echo "</marquee>";

?>

<?php
	$class 	= $this->router->class;
	$method = $this->router->method;
?>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?=base_url();?>" class="simple-text">
                    الوساطة التعاونية الذكية
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if(strtolower($class) == "home") echo "active"; ?>">
                    <a href="<?=base_url()?>index.php/home">
                        <i class="ti-server"></i>
                        <p>البورصة</p>
                    </a>
                </li>
								<?php
									if($this->show_phones){
								?>
                <li class="<?php if(strtolower($class) == "customers") echo "active"; ?>">
                    <a href="<?=base_url()?>index.php/customers">
                        <i class="ti-notepad"></i>
                        <p>دليل الهاتف</p>
                    </a>
                </li>

								<li class="<?php if($class == "excel_export" ) echo "active"; ?>">
                    <a href="<?=base_url()?>excel_export">
                        <i class="ti-download"></i>
                        <p>نسخة اكسل</p>
                    </a>
                </li>

								<?php } ?>
                <li class="<?php if($class == "whatappSender" || $class == "WhatappSender" ) echo "active"; ?>" >
                    <a href="<?=base_url()?>index.php/whatappSender/get_all_msgs">
                        <i class="ti-comment-alt"></i>
                        <p>الرسائل</p>
                    </a>
                </li>

								<li class="<?php if($class == "notes" || $class == "notes" ) echo "active"; ?>" >
                    <a href="<?=base_url()?>index.php/notes">
                        <i class="ti-bookmark"></i>
                        <p>ملاحظاتي</p>
                    </a>
                </li>

								<?php
					        if(@$_SESSION['permission'] == 1 ){ // || @get_cookie('permission') == 1){
					      ?>
                <li class="<?php if($class == "settings" && ($method != "show_users" && $method != "get_easte_added_by") ) echo "active"; ?>" >
                    <a href="<?=base_url()?>index.php/settings">
                        <i class="ti-settings"></i>
                        <p>الاعدادات</p>
                    </a>
                </li>
                <li class="<?php if($class == "settings" && ( $method == "show_users" || $method == "get_easte_added_by" )) echo "active"; ?>" >
                    <a href="<?=base_url()?>index.php/settings/show_users">
                        <i class="ti-user"></i>
                        <p>الموظفين</p>
                    </a>
                </li>
                <li class="<?php if($class == "scrapping") echo "active"; ?>">
                    <a href="<?=base_url()?>index.php/scrapping">
                        <i class="ti-link"></i>
                        <p>الروابط</p>
                    </a>
                </li>
								<?php } ?>
            </ul>
    	</div>
    </div>

    <div class="main-panel" dir="rtl">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:void(0)"><?=@$title?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
																<p>Stats</p>
                            </a>
                        </li> -->
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p class="notification"></p>
																		<?php
													              if(@get_cookie('email')){
													                  echo "
													                      <p>مرحبا ( $this->username ) </p>
													                  ";
													              }else if(@$_SESSION['email']){
																						echo "
																								<p>مرحبا ( $this->username ) </p>
																						";
																				}
																		?>
																		<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
																<li><a href='<?=base_url();?>home/show_ads' target="_blank">عرض الاعلانات</a></li>
                                <li><a href='<?=base_url();?>login/logout'>تسجيل الخروج</a></li>
                                <!-- <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li> -->
                              </ul>
                        </li>
												<!-- <li>
                            <a href="#">
																<i class="ti-settings"></i>
																<p>Settings</p>
                            </a>
                        </li> -->
                    </ul>

                </div>
            </div>
        </nav>
