<?php 
$this->load->view('common/header');
$this->load->view('common/header_content');
?>

<div class="main-container">
  <section class="page-top">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <h1>Blog</h1>
      </div>
      <div class="col-md-8 col-sm-8"> </div>
    </div>
  </section>
  <section class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="blog-posts">
          
          <?php
		 
		  if(!empty($all_data)){
			  foreach($all_data as $blog){
				  if($blog['title_alias'] != ''){
				  ?>
                  <article>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="post-image">
                        <div data-plugin-options="{&quot;directionNav&quot;:true}" class="flexslider">
                          <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides" style="width: 800%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                              <li style="width: 328px; float: left; display: block;" class="flex-active-slide"> <img src="<?=site_url('media/'.$blog['content_image'])?>"  draggable="false"> </li>
                              
                            </ul>
                          </div>
                          
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="post-content">
                        <h2> <a href="<?=site_url('cms_demo/article/'.$blog['title_alias'])?>"><?=$blog['content_title']?> </a></h2>
                        <p><?= substr(strip_tags($blog['content']),0,500)?> [...] </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="post-meta"> <span><i class="fa fa-calendar"></i> <?=date('F d, Y',strtotime($blog['created']))?></span>  <span><i class="fa fa-tag"></i>  <a href="<?=site_url('cms_demo/category/'.$blog['category_slug'])?>"> <?=$blog['category_name']?> </a> </span>  <a href="<?=site_url('cms_demo/article/'.$blog['title_alias'])?>" class="btn btn-xs btn-main-color pull-right"> Read more... </a> </div>
                    </div>
                  </div>
                </article>
                  
                  <?php
				  }
			  }
		  }else{
			  echo "No Data found.";
		  }
		  ?>
            
          </div>
        </div>
        <div class="col-md-3">
          <aside class="sidebar">
            <h4>Categories</h4>
            <?php
			if(!empty($categories)){
				
				echo '<ul class="nav nav-list blog-categories">';
				foreach($categories as $category){
					echo '<li> <a href="'.site_url('cms_demo/category/'.$category['category_slug']).'"> '.$category['category_name'].' </a> </li>';
				}
				echo '</ul>';
			}
			
			?>
           
          </aside>
        </div>
      </div>
    </div>
  </section>
</div>
<style>
.flex-active-slide > img {
    width: 100%;
}
</style>
<?php
$this->load->view('common/footer_content');
$this->load->view('common/footer');
?>
