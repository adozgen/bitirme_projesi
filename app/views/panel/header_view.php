<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr" xml:lang="tr">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PUBLIC; ?>/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_PUBLIC; ?>/css/navi.css" media="screen" />
<script type="text/javascript" src="<?php echo SITE_PUBLIC; ?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
                            <p><h3><font color="red">Hoşgeldiniz sn. <strong><?php $user=session::get("username");$_SESSION["name"]=$user; echo $user;?></strong></font></h3> </p>
			</div>
			<div class="right">
				<div class="align-right">
					<p><b><h3><font color="red">[ <a href="<?php echo SITE_URL;?>/admin/logout">ÇIKIŞ</a> ]</font></h3></b></p>
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
                            <?php 
                             if (isset($_SESSION["login"])) {                     
                            ?>
                            <li class="upp"><a href="http://localhost/mvc/panel/home"><b><font color="red">ANA SAYFA</font></b></a>
                             <?php }
 if (isset($_SESSION["loginoktmn"])) {
    ?>
                                <li class="upp"><a href="http://localhost/mvc/paneloktmn/homeoktmn"><b><font color="red">ANA SAYFA</font></b></a>
                             <?php }
                             ?>
                                
<!--				<li class="upp"><a href="#">Main control</a>
					<ul>
						<li>&#8250; <a href="">Visit site</a></li>
						<li>&#8250; <a href="">Reports</a></li>
						<li>&#8250; <a href="">Add new page</a></li>
						<li>&#8250; <a href="">Site config</a></li>
					</ul>
				</li>
				<li class="upp"><a href="#">Manage content</a>
					<ul>
						<li>&#8250; <a href="">Show all pages</a></li>
						<li>&#8250; <a href="">Add new page</a></li>
						<li>&#8250; <a href="">Add new gallery</a></li>
						<li>&#8250; <a href="">Categories</a></li>
					</ul>
				</li>
				<li class="upp"><a href="#">Users</a>
					<ul>
						<li>&#8250; <a href="">Show all uses</a></li>
						<li>&#8250; <a href="">Add new user</a></li>
						<li>&#8250; <a href="">Lock users</a></li>
					</ul>
				</li>
				<li class="upp"><a href="#">Settings</a>
					<ul>
						<li>&#8250; <a href="">Site configuration</a></li>
						<li>&#8250; <a href="">Contact Form</a></li>
					</ul>
				</li>-->
			</ul>
		</div>
	</div>