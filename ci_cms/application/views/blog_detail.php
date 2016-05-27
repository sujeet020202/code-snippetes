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
  <section class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="blog-posts post-page">
								<article>
									<div class="post-image">
										<div data-plugin-options="{&quot;directionNav&quot;:true}" class="flexslider">
											
										<div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides">
												<li style="width: 840px; float: left; display: block;" class="">
													<img src="<?=base_url('media/'.$content_detail['content_image'])?>" draggable="false">
												</li>
												
											</ul></div></div>
									</div>
									<div class="post-content">
										<h2>
										<a href="<?=site_url('media/'.$content_detail['title_alias'])?>">
											<?=$content_detail['content_title']?>
										</a></h2>
										<div class="post-meta">
											 <span><i class="fa fa-calendar"></i> <?=date('F d, Y',strtotime($content_detail['created']))?></span>  <span><i class="fa fa-tag"></i>  <a href="<?=site_url('cms_demo/category/'.$content_detail['category_slug'])?>"> <?=$content_detail['category_name']?> </a> </span> 
										</div>
                                        <p>
										<?=$content_detail['content']?>
										</p>
										
									</div>
								</article>
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
<?php
$this->load->view('common/footer_content');?>
<link rel="stylesheet" href="<?=site_url('assets/plugins/flex-slider/flexslider.css')?>">
<script src="<?=site_url('assets/plugins/flex-slider/jquery.flexslider.js')?>"></script>
<?php

$this->load->view('common/footer');
?>
