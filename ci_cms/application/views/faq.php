<?php 
$this->load->view('common/header');
$this->load->view('common/header_content');
?>

<div class="main-container">
  <section class="page-top">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <h1>All cities</h1>
      </div>
      <div class="col-md-8 col-sm-8"> </div>
    </div>
  </section>
  <section class="wrapper padding50">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
          <!-- start: FAQ -->
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs tab-teal" id="myTab3">
              <?php 
			 if(!empty($all_data)){
				 $all_data = _group_by($all_data,array('category_name','category_ids'));
				 $i= 1;
				 $categories = array_keys($all_data);
			 
			 foreach($categories as $category){
				$class= '';
				 if($i == 1){
					 $class= 'active';
				 }
				 $i++;
				 $category_data = explode('###',$category);
				 
				 ?>
              <li class="<?php echo $class; ?>"> <a href="#faq_example<?php echo $category_data[1]; ?>" data-toggle="tab"> <?php echo $category_data[0]; ?> </a> </li>
              <?php }
			  
							 } ?>
            </ul>
            <div class="tab-content">
              <?php
			if(!empty($all_data)){
				$categories = array_keys($all_data);
				$counter = 0;
				$i = 1;
				
				foreach($all_data as $category){
					$class= '';
					
					 if($i == 1){
						 $class= 'active';
					 }
					 $i++;
					 $category_data = explode('###',$categories[$counter]);
					?>
              <div class="tab-pane <?php echo $class; ?>" id="faq_example<?php echo $category_data[1]; ?>">
                <div id="accordion" class="panel-group accordion accordion-custom accordion-teal">
                  <?php 
					  foreach($category as $val){
					 
					 ?>
                  <div class="panel panel-default sub_faq_accordion">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <a href="#faq_<?php echo $val['content_id']; ?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed"> <i class="fa fa-plus-circle"></i> <?php echo $val['content_title']; ?> </a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="faq_<?php echo $val['content_id']; ?>">
                      <div class="panel-body"> 
					  <?php
					  
					  preg_match_all('/{(.*?)}/', $val['content'], $matches);
			
					 if(isset($matches[1]) && !empty($matches[1])){
						 $slider = '';
						 foreach($matches[1] as $shortcode){
							 $slider = getSlider("{".$shortcode."}");
							 
							 $data[$shortcode] = $slider;
						 }
						 
						 $data['content'] = $val['content'];
						 echo $this->parser->parse('cms_demo/parse_content', $data, TRUE);
					 }else{
					
						echo $val['content'];
					 }
					  ?>
					  
					  <?php //echo $val['content']; ?> </div>
                    </div>
                  </div>
                  <?php 
					}
				 ?>
                </div>
              </div>
              <?php
					  $counter++;  
					}
				}
				 ?>
            </div>
          </div>
          <!-- end: FAQ --> 
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
