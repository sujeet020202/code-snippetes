
<?php
//echo '<pre/>';
  // print_r($websetting = $this->session->userdata('websetting'));
?>

<?php $this->load->view('common/header'); ?>
<!-- Start: HEADER -->
<?php $this->load->view('common/header_content'); ?>        
<!-- end: HEADER -->

		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			
			<!-- start: REVOLUTION SLIDERS -->
			<section class="fullwidthbanner-container">
				<div class="fullwidthabnner">
					<ul>
                    
                     <?php
					 $home_slider = select('manage_home_slider',"where status='Active'");
if(!empty($home_slider)){
							foreach($home_slider as $slides){
?>
                    
                    
						<!-- start: FIRST SLIDE -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<img src="<?php echo base_url('media/homeslider/'.$slides["home_slider_image"]);?>"  style="background-color:rgb(246, 246, 246)" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat">
							<?=$slides['home_slider_subtitle'];?>
							
						</li>
                        <?php }}?>
						
					</ul>
				</div>
			</section>
			<!-- end: REVOLUTION SLIDERS -->
			
			<section class="wrapper wrapper-grey padding50">
				<!-- start: PORTFOLIO CONTAINER -->
				<div class="container">
					<div class="row">
						
						<div class="col-md-12 col-sm-12">
         <?php
		 if(isset($content)){
			preg_match_all('/{(.*?)}/', $content['content'], $matches);
			
			 if(isset($matches[1]) && !empty($matches[1])){
				 $slider = '';
				 foreach($matches[1] as $shortcode){
					 $slider = getSlider("{".$shortcode."}");
					 
					 $data[$shortcode] = $slider;
				 }
				 
				 $data['content'] = $content['content'];
				 echo $this->parser->parse('parse_content', $data, TRUE);
			 }else{
			
			 	echo $content['content'];
			 }
		 }
		 ?>
        </div>
					</div>
				</div>
				<!-- end: PORTFOLIO CONTAINER -->
			</section>

			
		</div>
		<!-- end: MAIN CONTAINER -->

<?php $this->load->view('common/footer_content'); ?>
<link rel="stylesheet" href="<?=base_url('assets/plugins/flex-slider/flexslider.css')?>">
<link rel="stylesheet" href="http://192.168.1.2/shobhit/ci/transportsolutions/assets/plugins/revolution_slider/rs-plugin/css/settings.css">
<script src="<?=base_url('assets/plugins/flex-slider/jquery.flexslider.js')?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js')?>"></script>
		<script src="<?=base_url('assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
        <script src="<?=base_url('assets/js/front_end/home_slider.js')?>"></script>
       
<script>
jQuery(document).ready(function() {
		Main.init();
		HomeSlider.init();
});

</script>


			
<!-- start: FOOTER -->
<?php $this->load->view('common/footer'); ?>