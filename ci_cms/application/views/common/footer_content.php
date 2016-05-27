<?php
 $websetting = $this->session->userdata('websetting');
 $site_address =  $websetting['site_address'];
 $site_email=$websetting['site_email'];
 $site_copyright =  $websetting['site_copyright'];
 $contact_number=$websetting['contact_number'];
 $site_name =  $websetting['site_name'];
?>

<!-- start: FOOTER -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="newsletter">
							<h4>Newsletter</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.
							</p>
							<div id="msg_success" style="display:none;"></div>
							<form method="post" action="<?php echo base_url('/Azaad/subscribe'); ?>" id="newsletterForm">
								<div class="input-group">
									<input type="text" name="email" id="subscribe" placeholder="Email Address" class="form-control">
									<span class="input-group-btn">
										<button type="button" name="subscribe_submit" class="btn btn-default" onclick="subscribe_email();"><!--onclick="subscribe_email();"-->
											Go!
										</button> </span>
								</div>
							</form>
							
							
						</div>
					</div>
					<div class="col-md-3">
						<h4>Latest Tweet</h4>
						<div class="twitter" id="tweet">
							<i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.
							<a href="#" class="time">
								12 Dec
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-details">
							<h4>Contact Us</h4>
							<ul class="contact">
								<li>
									<p>
										<i class="fa fa-map-marker"></i><strong>Address:</strong> <?=$site_address;?>
									</p>
								</li>
								<li>
									<p>
										<i class="fa fa-phone"></i><strong>Phone:</strong> <?=$contact_number;?>
									</p>
								</li>
								<li>
									<p>
										<i class="fa fa-envelope"></i><strong>Email:</strong>
										<a href="mailto:<?=$site_email;?>">
											<?=$site_email;?>
										</a>
									</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<h4>Follow Us</h4>
						<div class="social-icons">
							<ul>
								<?php
 if(!empty($websetting) && !empty($websetting['twitter_url'])){
	$twitter_url =  $websetting['twitter_url'];
	echo '<li class="social-twitter tooltips" data-original-title="Twitter" data-placement="top"> <a target="_blank" href="'.$twitter_url.'"> Twitter </a> </li>';
}

 if(!empty($websetting) && !empty($websetting['flicker_url'])){
	$flicker_url =  $websetting['flicker_url'];
	echo '<li class="social-flicker tooltips" data-original-title="Flicker" data-placement="top"> <a target="_blank" href="'.$flicker_url.'"> Flicker </a> </li>';
}

 if(!empty($websetting) && !empty($websetting['facebook_url'])){
	$facebook_url =  $websetting['facebook_url'];
	echo '<li class="social-facebook tooltips" data-original-title="Facebook" data-placement="top"> <a target="_blank" href="'.$facebook_url.'"> Facebook </a> </li>';
}



 if(!empty($websetting) && !empty($websetting['google_url'])){
	$google_url =  $websetting['google_url'];
	echo '<li class="social-google tooltips" data-original-title="Google" data-placement="top"> <a target="_blank" href="'.$google_url.'"> Google+ </a> </li>';
}

 if(!empty($websetting) && !empty($websetting['linkedin_url'])){
	$linkedin_url =  $websetting['linkedin_url'];
	echo '<li class="social-linkedin tooltips" data-original-title="LinkedIn" data-placement="top"> <a target="_blank" href="'.$linkedin_url.'"> LinkedIn </a> </li>';
}

if(!empty($websetting) && !empty($websetting['pinterest_url'])){
	$pinterest_url =  $websetting['pinterest_url'];
	echo ' <li class="social-pinterest tooltips" data-original-title="Pinterest" data-placement="top"> <a target="_blank" href="'.$pinterest_url.'"> Pinterest </a> </li>';
}
?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-1">
							<a class="logo" href="<?=base_url();?>">
								<?=$site_name;?>
							</a>
						</div>
						<div class="col-md-7">
							<p>
								<?=$site_copyright;?>
							</p>
						</div>
						<div class="col-md-4">
							
						</div>
					</div>
				</div>
			</div>
		</footer>
		<a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
		<!-- end: FOOTER --> 

<!-- start: MAIN JAVASCRIPTS --> 

<!--[if lt IE 9]>

<script src="<?=base_url('assets/plugins/respond.min.js');?>"></script>

<script src="<?=base_url('assets/plugins/excanvas.min.js');?>"></script>

<script src="<?=base_url('assets/plugins/html5shiv.js');?>"></script>

<script src="<?=base_url('assets/plugins/jQuery-lib/1.10.2/jquery.min.js');?>" type="text/javascript"></script>

<![endif]--> 

<!--[if gte IE 9]><!--> 

<script src="<?=base_url('assets/plugins/jQuery-lib/2.0.3/jquery.min.js');?>"></script> 

<!--<![endif]--> 

<script src="<?=base_url('assets/js/validation/jquery.form.min.js');?>"></script> 

<script src="<?=base_url('assets/js/validation/jquery.validate.min.js');?>"></script> 

<script src="<?=base_url('assets/js/validation/registration_main.js');?>"></script> 

<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script> 

<script src="<?=base_url('assets/plugins/jquery.transit/jquery.transit.js');?>"></script> 

<script src="<?=base_url('assets/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js');?>"></script> 

<script src="<?=base_url('assets/plugins/jquery.appear/jquery.appear.js');?>"></script> 

<script src="<?=base_url('assets/plugins/blockUI/jquery.blockUI.js');?>"></script> 

<script src="<?=base_url('assets/plugins/jquery-cookie/jquery.cookie.js');?>"></script> 
<script src="<?=base_url('assets/plugins/bootstrap-offcanvas/js/bootstrap.offcanvas.min.js');?>"></script>
<script src="<?=base_url('assets/js/front_end/main.js');?>"></script> 

<script src="<?=base_url('assets/js/custom/email-subscribe.js');?>"></script> 

<script src="<?=base_url('assets/plugins/iCheck/jquery.icheck.min.js');?>"></script> 
<script src="<?=base_url('assets/plugins/gritter/js/jquery.gritter.min.js')?>"></script>


<!-- end: MAIN JAVASCRIPTS --> 

<?php /*?><link rel="stylesheet" href="<?=base_url('assets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css');?>">
		<link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css');?>">
		<link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap-social-buttons/social-buttons-3.css');?>">

<script src="<?=base_url('assets/plugins/ladda-bootstrap/dist/spin.min.js');?>"></script>
		<script src="<?=base_url('assets/plugins/ladda-bootstrap/dist/ladda.min.js');?>"></script>
		<script src="<?=base_url('assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js');?>"></script>
		<script src="<?=base_url('assets/js/ui-buttons.js');?>"></script><?php */?>

<?php



	if(isset($scriptsrc) && !empty($scriptsrc)){
		$i=0;
		foreach($scriptsrc as $value){$i++;
			$tab = ($i!=1)?"\t\t ":"";
			echo $tab.'<script src="'.base_url().$value.'" type="text/javascript"></script>'."\n";
		}
	}
	if(isset($script) && !empty($script)){
		foreach($script as $value){
			echo $value;
		}
	}
?>