<?php 
$f3=Base::instance(); 
if($f3->get('PATH') == "/"){
	$path = "/index";
} else {
	$path = $f3->get('PATH');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if($f3->get('env')=="dev") { ?>
		<link rel="stylesheet" href="<?php echo $f3->get('asset_domain');?><?php echo $f3->get('asset_url');?>css/default.css"> />
		<?php if(file_exists($f3->get('asset_domain').$f3->get('asset_url').$path.".css")) { ?>
			<link rel="<?php echo $f3->get('asset_domain');?><?php echo $f3->get('asset_url');?>/css/custom<?php echo $path;?>.css" />
		<?php } ?>
	<?php } else { ?>
		<link rel="stylesheet" href="<?php echo $f3->get('asset_domain');?><?php echo $f3->get('asset_url');?>css/compressed.css"> />
	<?php } ?>
</head>
<body class="<?php echo $f3->get('classname');?>">

<?php include($f3->get('UI').$template); ?> 

<?php if(file_exists($f3->get('asset_domain').$f3->get('asset_url').$path.".js")) { ?>
	<script src="<?php echo $f3->get('asset_domain');?><?php echo $f3->get('asset_url');?>/js/custom<?php echo $path;?>.js"></script>
<?php } ?>

</body>
</html>
