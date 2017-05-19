<?php $f3=Base::instance(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php echo $f3->get('title'); ?></title>
	
	<link href="/css/default.css" rel="stylesheet">

	<?php if($f3->get('env')!="dev") { ?>

	<?php } else { ?>

	<?php } ?>
</head>
<body class="<?php echo $f3->get('classname');?>">

	<div class="middle-box text-center loginscreen animated fadeInDown">
		<div>
			<div>
				<h1 class="logo-name">BackendAdmin</h1>
			</div>
			<form class="m-t" role="form" action="/user/login" method="POST">
				<div class="form-group">
					<input type="email" name="username" class="form-control" placeholder="Username" required="">
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required="">
					<input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="ref">
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
			</form>
		</div>
	</div>


</body>
</html>
