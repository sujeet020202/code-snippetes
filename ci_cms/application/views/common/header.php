<!DOCTYPE html>
<!-- Template Name: Clip-One - Frontend | Build with Twitter Bootstrap 3 | Version: 1.5 | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
        <?php
		
$websetting = $this->session->userdata('websetting');

if(empty($page_title) && !empty($websetting)){
	$page_title =  $websetting['meta_title'];
}
if(empty($meta_keywords) && !empty($websetting)){
	$meta_keywords =  $websetting['meta_keywords'];
}
if(empty($meta_description) && !empty($websetting)){
	$meta_description =  $websetting['meta_description'];
}
?>

<title><?=$page_title?></title>
<meta name="description" content="<?=$meta_keywords?>"/>
<meta name="keywords" content="<?=$meta_description?>"/>


        

		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
        
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
		<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="<?=base_url('assets/fonts/style.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/plugins/animate.css/animate.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/plugins/iCheck/skins/all.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/plugins/bootstrap-offcanvas/css/bootstrap.offcanvas.min.css');?>" rel="stylesheet"/>
        
		<link href="<?=base_url('assets/css/front_end/custom.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/css/front_end/main.css');?>" rel="stylesheet">        

		<link href="<?=base_url('assets/css/front_end/main-responsive.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/front_end/theme_blue.css');?>" rel="stylesheet" type="text/css" id="skin_color">
        <link rel="stylesheet" href="<?=base_url('assets/plugins/gritter/css/jquery.gritter.css')?>">
		<!-- end: MAIN CSS -->
        <!-- start: EXTRA CSS REQUIRED FOR THIS PAGE ONLY -->
		 <?php
        	if(isset($stylesheet) && !empty($stylesheet)){
				$i=0;
				foreach($stylesheet as $value){$i++;								
					$tab = ($i!=1)?"\t\t ":"";
					echo $tab.'<link rel="stylesheet" href="'.base_url($value).'">'."\n";
				}
			}
			if(isset($style) && !empty($style)){
				foreach($style as $value){
					echo $value;
				}
			}
		?>
		<!-- end: EXTRA CSS REQUIRED FOR THIS PAGE ONLY -->
		
		<!-- start: HTML5SHIV FOR IE8 -->
		<!--[if lt IE 9]>
		<script src="<?=base_url('assets/plugins/html5shiv.js');?>"></script>
		<![endif]-->
		<!-- end: HTML5SHIV FOR IE8 -->        
		<link rel="shortcut icon" href="<?=base_url('favicon.ico')?>" /> 
        <script> 
		var base_url = "<?php echo base_url();?>";
		var site_url = "<?php echo site_url('/');?>";
		var session_user_id = '<?php echo $this->session->userdata('user_id'); ?>';
        </script>
	</head>
	<!-- end: HEAD -->
	<body class="body-offcanvas">
    <div class="loader_wrapper" id="loader_wrapper" style="z-index:1050; display:none">
        <div class="loader_text">
            <p>Please Wait Loading...</p>
            <p style="color:#F00; font-size:x-large; font-weight:bold">Bridge</p>
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>