<?php 
$current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$this->session->set_userdata('request_url', $current_url);
?>
<style type="text/css">
.error{
	color: #b94a48;
	}
.form-control.error {
    border-color: #b94a48 !important;
	box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);
}

.wishlist-icon-favorites{
    color: #428BCA;
    cursor: pointer;
    font-size: 32px;
    position: absolute;
    right: 3px;
    top: 2px;
    width: 40px;
    z-index: 10;
	}
	
	.rating-input{
		cursor:pointer;
		font-size: 20px;
	}	
	
.fa.fa-heart{
  color:#428bca;	
}	
.stars { margin: 0px 0;font-size: 16px;color: #428BCA;cursor:pointer;}
.stars .review {
    color: #888;
    font-size: 10px;
}

/*.active{
	background-attachment: scroll;
    background-clip: border-box;
    background-color: #428bca;
    background-image: none;
    background-origin: padding-box;
    background-position: 0 0;
    background-repeat: repeat;
    background-size: auto auto;
    border-bottom-color: -moz-use-text-color;
    border-bottom-style: none;
    border-bottom-width: medium;
    color: #ffffff;
    padding-top: 2px !important;
}*/
</style>
	</body>
</html>