<?php $this->load->view('common/header'); ?>
<?php foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<!-- Start: HEADER -->
<?php $this->load->view('common/header_content'); ?>
<!-- end: HEADER -->

<!-- start: MAIN CONTAINER -->
<div class="main-container">
  <div class="navbar-content"> 
    <!-- start: SIDEBAR -->
    <?php $this->load->view('common/left_navigation'); ?>
    <!-- end: SIDEBAR --> 
  </div>
  <!-- start: PAGE -->
  <div class="main-content">
    <div class="container"> 
      <!-- start: PAGE HEADER -->
      <div class="row">
        <div class="col-sm-12"> 
          <!-- start: PAGE TITLE & BREADCRUMB -->
          <?php $this->load->view('common/breadcrumb'); ?>
          <div class="page-header">
            <h1><?php echo $page_title;?></h1>
          </div>
          <!-- end: PAGE TITLE & BREADCRUMB --> 
        </div>
      </div>
      <!-- end: PAGE HEADER --> 
      <!-- start: PAGE CONTENT -->
      <div class="row">
        <div class="col-lg-12"> <?php echo validation_errors(); ?>
          <form action="" method="post" enctype="multipart/form-data">
            
            <?php
         if(isset($slider_images) && !empty($slider_images)){
			echo "<script>var image_counter =".count($slider_images)."; </script>";
			$j=0;
			?>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <input required="required" class="form-control" type="text" value="<?=$slider_images[0]['slider_name']?>" name="slider_name" id="slider_name" placeholder="slider name" />
                </div>
              </div>
            </div>
            <?php
			foreach($slider_images as $slider_image){
				?>
            <div class="row  form-group ">
              <div class="col-md-3 ">
                <div class="form-group">
                  <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img alt="" src="<?=base_url('media/slider/800600/'.$slider_image['image_name'])?>"> 
                    <!-- <input type="hidden" value="<?=$slider_image['image_name']?>" name="file_name[<?=$j?>]" />--> 
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <textarea class="text_img" rows="2"  placeholder="image caption" name="image_title[<?=$j?>]" id=""><?=$slider_image['image_title']?>
</textarea>
                <input type="hidden" value="<?=$slider_image['id']?>" name="id[<?=$j?>]" />
              </div>
              <div class="col-md-3"> <a style="color:red;font-size:18px;" href="javascript:void(0)" class="delete_image" id="image_caption_<?=$slider_image['id']?>"><i class="fa fa-times"></i></a> </div>
            </div>
            <?php
			$j++;
		}
	}else{
		
		echo "<script>var image_counter =1; </script>";
	?>
    <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <input class="form-control" type="text" value="<?=$slider_images[0]['slider_name']?>" name="slider_name" id="slider_name" placeholder="slider name" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 ">
                <div class="form-group">
                  <div data-provides="fileupload" class="fileupload fileupload-new"> <span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">Add Image</span><span class="fileupload-exists">Change</span>
                    <input type="file" name="image_name[0]">
                    </span> <span class="fileupload-preview"></span> <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="wsdindex.html#"> &times; </a> </div>
                </div>
              </div>
              <div class="col-md-3 ">
                <textarea class="text_img" rows="2"  placeholder="image caption" name="image_title[0]" id=""></textarea>
                <input type="hidden" value="" name="id[0]" />
              </div>
            </div>
            <?php 
	
	}
	?>
            <div class="row" id="moreimg"></div>
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">&nbsp;</label>
              <button type="button" id="add_more_image" class="btn btn-green"> <i class="fa fa-plus"></i>&nbsp;Add more image </button>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-10"> &nbsp;</div>
              <div class="col-md-1">
                <input type="submit" class="btn btn-success" value="Save" />
              </div>
              <div class="col-md-1">
                <input type="button" class="btn btn-danger" value="Cancel" />
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end: PAGE CONTENT--> 
    </div>
  </div>
  <!-- end: PAGE --> 
</div>
<!-- end: MAIN CONTAINER -->

<?php $this->load->view('common/footer_content'); ?>
<?php
 $websetting = $this->session->userdata('websetting');
 $site_address =  $websetting['site_address'];
 $site_copyright =  $websetting['site_copyright'];
?>
<div class="footer clearfix">
  <div class="footer-inner">
    <?=$site_copyright.' '.str_replace("<br/>","",$site_address);?>
  </div>
  <div class="footer-items"> <span class="go-top"><i class="clip-chevron-up"></i></span> </div>
</div>
<!-- end: FOOTER --> 
 
<link rel="stylesheet" href="<?php echo config_item('site_url');?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
<script src="<?php echo config_item('site_url');?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script>
jQuery(document).ready(function(e) {
	Main.init();
    // FormWizard.init();
	 //Dropzone.init();
});
jQuery(document).on("click",'#add_more_image', function() {
	var moreImg = '<div class="form-group upload_con_'+image_counter+'" style="overflow:auto"><div class="col-md-3"><div data-provides="fileupload" class="fileupload fileupload-new"> <span class="btn btn-file btn-light-grey"><i class="fa fa-folder-open-o"></i> <span class="fileupload-new">add image</span><span class="fileupload-exists">Change</span><input type="file" name="image_name['+image_counter+']"></span><span class="fileupload-preview"></span> <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="wsdindex.html#"> &times; </a> </div></div><div class="col-md-3 "><textarea class="text_img" id="" name="image_title['+image_counter+']" placeholder="image caption"  rows="2"></textarea> <input type="hidden" name="id['+image_counter+']" /></div><div class="col-md-3">  <a style="color:red;font-size:18px;" href="javascript:void(0)" class="delete_image_temp" id="'+image_counter+'"><i class="fa fa-times"></i></a></div></div>';
			jQuery('#moreimg').append(moreImg);
			image_counter++;
		});
		jQuery(document).on("click",'.delete_image_temp', function() {
			current_id = jQuery(this).attr('id');
			jQuery('.upload_con_'+current_id).remove();
			
			
		});
		jQuery(document).on("click",'.delete_image', function() {
			current_id = jQuery(this).attr('id');
			var con = confirm('Are you sure to delete ?');
			if(con === true){
				jQuery.post(base_url+"manage_content/delete_images/"+current_id,function(){
					jQuery('#'+current_id).parents('.form-group').remove();
				});
			}
			
		});
</script> 

<!-- start: FOOTER -->
<?php $this->load->view('common/footer'); ?>
