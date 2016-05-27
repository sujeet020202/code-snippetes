<!-- start: HEADER -->

  
<header class="single-menu">
  <div role="navigation" class="navbar navbar-default navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
      <div class="navbar-header"> 
        <!-- start: RESPONSIVE MENU TOGGLER -->
        <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
        <!--<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">-->
            <span class="sr-only">Toggle navigation</span>
            <span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </span>
        </button>
        <!-- end: RESPONSIVE MENU TOGGLER --> 
        <!-- start: LOGO --> 
        
        <a class="navbar-brand" href="<?=site_url();?>"> <img src="" alt="Transport Solutions"> </a> 
        <!-- end: LOGO --> 
      </div>
      <div class="navbar-offcanvas navbar-offcanvas-touch" id="js-bootstrap-offcanvas">
        <!--<div class="navbar-collapse collapse">-->
        <div class="sidebar_logo hidden-sm hidden-md hidden-lg">
            <a class="navbar-brand" href="<?=site_url();?>">
                <img src="" alt="Transport Solutions">
            </a>
            <div class="clear"></div>
            <hr>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <?php 
$navs = getNavigationfromCMS();

if(!empty($navs)){
	 $cycle = 0;
	 $group_navs = _group_by_array_key($navs,'groupID');
	
	foreach($group_navs as $navs){
		foreach($navs as $nav){
			if($nav['mi_item_type'] == 3){
				$link = $nav['mi_link'];
			}elseif($nav['mi_item_type'] == 2){
				$link = site_url($nav['mi_link']);
			}else{
				$link = base_url('page/'.$nav['mi_alias']);
			}
			if(count($navs) > 1){
				$class = 'class="dropdown hidden-xs"';
				$attr = 'data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle"';
				$icon = '<b class="caret"></b>';
				if($nav['mi_parant_menu'] == 0){
					echo '<li '.$class .'"><a '.$attr.' href="'.$link.'" target="'.$nav['mi_target'].'">'.ucfirst($nav['mi_title']).$icon.' </a>';
				}else{
					echo '<ul class="dropdown-menu"><li><a href="'.$link.'" target="'.$nav['mi_target'].'">'.ucfirst($nav['mi_title']).'</a></li></ul>';
					echo '</li>';
				}
			}else{
				if($nav['mi_title'] != 'home'){
					if($nav['visible_to'] == 1 && !$this->session->userdata('user_id')){
						echo '<li><a href="'.$link.'" target="'.$nav['mi_target'].'">'.ucfirst($nav['mi_title']).' </a>';
					}else if($nav['visible_to'] == 2 && $this->session->userdata('user_id')){
						echo '<li><a href="'.$link.'" target="'.$nav['mi_target'].'">'.ucfirst($nav['mi_title']).' </a>';
					}
					if($nav['visible_to'] == 3){
						echo '<li><a href="'.$link.'" target="'.$nav['mi_target'].'">'.ucfirst($nav['mi_title']).' </a>';
					}
				}
				
			}
		
		}
	}
}

?>
          
        </ul>
      </div>
    </div>
    <div style="display:none"  class="messageShow text-center col-sm-12" id="messageShow">
    </div>
    <!-- end: TOP NAVIGATION CONTAINER --> 
  </div>
</header>
<!-- end: HEADER -->
