<?php 
$this->load->view('common/header');
$this->load->view('common/header_content');
?>
<div class="main-container">
  <section class="page-top">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <h1><?php echo $content['content_title']; ?></h1>
      </div>
      <div class="col-md-8 col-sm-8">
        
      </div>
    </div>
  </section>
  <section class="wrapper padding50">
    <div class="container">
      <div class="row all_cities">
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
  </section>
</div>
<?php
$this->load->view('common/footer_content');?>
<link rel="stylesheet" href="<?=base_url('assets/plugins/flex-slider/flexslider.css')?>">
<script src="<?=base_url('assets/plugins/flex-slider/jquery.flexslider.js')?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
<script>
jQuery(document).ready(function() {
		Main.init();
});

</script>
<?php
$this->load->view('common/footer');
?>