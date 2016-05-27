<?php $this->load->view('common/header'); ?>
<?php 
if(!empty($css_files)){
foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach;

}?>

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
        <div class="col-lg-12">
         <?php echo validation_errors(); ?>
          <form action="" method="post">
         <div class="row"> 
          <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Menu<span class="symbol required"></span> </label>
                <select id="menu_id" name="menu_id"  class="form-control">
                <option value="">Select menu</option>
                <?php $menus=select('cms_menus',"where menu_status='Active'");
				foreach($menus as $menuData){?>
                
					<option  value="<?php echo $menuData["menu_id"];?>"><?php echo $menuData["menu_title"];?></option>
				<?php
				 }
				 ?>
				</select>
                 </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Parent Items <span class=""></span> </label>
                <select id="mi_parant_menu" name="mi_parant_menu"  class="form-control">
                <option value="0">Select parent item</option>
                <?php $parant_menu=select('cms_menu_item',"where mi_status='Active' and mi_parant_menu='0'");
				foreach($parant_menu as $parantData){?>
                
					<option  value="<?php echo $parantData["mi_id"];?>"><?php echo $parantData["mi_title"];?></option>
				<?php
				 }
				 ?>
				</select>
                 </div>
            </div>
          
          
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Menu Title<span class="symbol required"></span> </label>
                
                <input type="text" required="required" placeholder="Menu title" id="mi_title"  name="mi_title" class="form-control" value="<?=$this->input->post('mi_title')?>">
                 </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Menu Alias<span class="symbol required"></span> </label>
                
                <input type="text" required="required"  placeholder="Auto generate from title" id="mi_alias"  name="mi_alias" value="<?=$this->input->post('mi_alias')?>" class="form-control">
                 </div>
            </div>
            
            </div>
            <div class="row">
             <div class="col-md-2">
              <div class="form-group">
              <label class="control-label"> Select Menu type<span class="symbol required"></span> </label>
              </div>
              </div>
            <div class="col-md-2">
              <div class="form-group">
             
             <input type="radio" name="mi_item_type" value="1" id="article" checked="checked" />   <label class="control-label" for="article"> Article Based </label>
             </div>
             </div>
             
              <div class="col-md-2">
              <div class="form-group">
             <input type="radio" name="mi_item_type" value="4" id="section_based" />   <label for="section_based" class="control-label"> Section Based</label>
             </div>
             </div>
             
             <div class="col-md-2">
              <div class="form-group">
             <input type="radio" name="mi_item_type" value="2" id="current_site_url" />   <label for="current_site_url" class="control-label"> Other URL of this site</label>
             </div>
             </div>
              <div class="col-md-2">
              <div class="form-group">
                <input type="radio" name="mi_item_type" value="3" id="external_url"  />   <label class="control-label" for="external_url"> External site URL </label>
              </div>
              </div>
              <div  class=" col-md-offset-2"> &nbsp; </div>
              </div>
              <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Select Content Article<span class="symbol required"></span> </label>
                
                
               <select id="content_id" name="content_id"  class="form-control">
               <option value="">Select content article</option>
                <?php $articles=select('cms_content',"where content_status='Active'");
				foreach($articles as $article){?>
                
					<option  value="<?php echo $article["content_id"].'###'.$article["title_alias"];?>"><?php echo $article["content_title"];?></option>
				<?php
				 }
				 ?>
				</select>
                 </div>
            </div>
            
            
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Select Section<span class="symbol required"></span> </label>
                
                
               <select id="section_id" name="section_id"  class="form-control" disabled="disabled">
               <option value="">Select section</option>
                <?php $articles=select('cms_section',"where section_status='Active'");
				foreach($articles as $article){?>
                
					<option  value="<?php echo $article["section_id"].'###'.$article["section_name"];?>"><?php echo $article["section_name"];?></option>
				<?php
				 }
				 ?>
				</select>
                 </div>
            </div>
            
            
            
            <div class="col-md-6">
              <div class="form-group">
              
                <label class="control-label"> Item Link<span class="symbol required"></span> </label>
                <div class="input-group"> <span id="basic-addon3" class="input-group-addon"><?=config_item('site_url');?></span> <input type="text" aria-describedby="basic-addon3"  id="mi_link"  name="mi_link" class="form-control"  value="<?=$this->input->post('mi_link')?>"> </div>
              
                 </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
             
                 <label class="control-label"> Menu visible to :<span class=></span> </label>
                </div>
                <div class="col-md-3">
             <div class="form-group">
             
                <input type="radio" name="visible_to" value="2" id="register"  />   <label class="control-label" for="register"> Registerd user </label>
             
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
              
                <input type="radio" name="visible_to" value="1" id="guest"  />   <label class="control-label" for="guest"> Guest </label>
              </div>
              </div>
              
              <div class="col-md-3">
              <div class="form-group">
              
                <input type="radio" name="visible_to" value="3" id="all"  />   <label class="control-label" for="all"> All </label>
              </div>
              </div>
                 
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
             
                 <label class="control-label"> Window Target<span class=></span> </label>
                <select id="mi_target" name="mi_target"  class="form-control">
               
                <option value="_parent">Same tab</option>
                <option value="_blank">New tab</option>
                </select>
                
              
                 </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group">
             
                 <label class="control-label"> Select Template<span class=></span> </label>
                <select id="mi_template" name="mi_template"  class="form-control">
                <option value="">Select template</option>
                <option value="content">Default</option>
                <option value="faq">FAQ page</option>
                <option value="blog">BLOG page</option>
                </select>
                
              
                 </div>
            
            </div>
            </div>
            <div class="row">
            <div class="col-md-10"> &nbsp;</div>
            <div class="col-md-1"><input type="submit" class="btn btn-success" value="Save" /></div>
            <div class="col-md-1"><input type="button" class="btn btn-danger" value="Cancel" /></div>
            
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

<?php //$this->load->view('common/footer_content'); ?>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
			jQuery(document).ready(function() {
				//Main.init();
				
				var menu_item_type = jQuery('input[name="mi_item_type"]:checked').val();
				select_link();
				jQuery('input[name="mi_item_type"]').click(function(){
					select_link();
					
				});
				jQuery('#mi_title').blur(function(e) {
                    var menu_alias = jQuery(this).val().replace(/ /g,"-");
					jQuery('#mi_alias').val(menu_alias);
                });
				jQuery('#content_id').change(function(){
					var selected_val = jQuery(this).val();
					if(selected_val == ''){
						jQuery('#mi_link').removeAttr("readonly");
					}else{
						var value_array = selected_val.split('###');
						jQuery('#mi_link').val(value_array[1]);
						jQuery('#mi_link').attr("readonly","readonly");
					}
				});
				
				jQuery('#section_id').change(function(){
					var selected_val = jQuery(this).val();
					if(selected_val == ''){
						jQuery('#mi_link').removeAttr("readonly");
					}else{
						var value_array = selected_val.split('###');
						jQuery('#mi_link').val(value_array[1].replace(/ /g,"-"));
						jQuery('#mi_link').attr("readonly","readonly");
					}
				});
			});
			
			function select_link(){
				var menu_item_type = jQuery('input[name="mi_item_type"]:checked').val();
					if(menu_item_type == '1'){
						jQuery('#content_id').removeAttr("disabled");
						jQuery('#mi_link').attr("readonly","readonly");
						jQuery('#section_id').attr("disabled","disabled");
						jQuery('#section_id').val('');
						jQuery('#mi_link').removeAttr("placeholder");
						jQuery('#basic-addon3').text(site_url);
					}else if(menu_item_type == '2'){
						jQuery('#content_id').attr("disabled","disabled");
						jQuery('#content_id').val('');
						jQuery('#section_id').attr("disabled","disabled");
						jQuery('#section_id').val('');
						jQuery('#mi_link').val('');
						jQuery('#mi_link').removeAttr("readonly");
						jQuery('#mi_link').attr("placeholder",'enter part after the "'+site_url+'"');
						jQuery('#basic-addon3').text(site_url);
						
						
					}else if(menu_item_type == '3'){
						jQuery('#content_id').attr("disabled","disabled");
						jQuery('#content_id').val('');
						jQuery('#section_id').attr("disabled","disabled");
						jQuery('#section_id').val('');
						jQuery('#mi_link').val('');
						jQuery('#mi_link').removeAttr("readonly");
						jQuery('#mi_link').attr("placeholder","Enter a external site URL");
						jQuery('#basic-addon3').text('http://');
						
					}
					else if(menu_item_type == '4'){
						jQuery('#content_id').attr("disabled","disabled");
						jQuery('#content_id').val('');
						jQuery('#section_id').removeAttr("disabled");
						jQuery('#mi_link').val('');
						jQuery('#mi_link').attr("readonly","readonly");
						jQuery('#mi_link').removeAttr("placeholder");
						jQuery('#basic-addon3').text(site_url);
						
					}
			}
		</script>

<!-- start: FOOTER -->
<?php $this->load->view('common/footer'); ?>
