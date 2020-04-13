<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php	
	$this->load->helper('url');		
?>

<style>
	#page_title{
	font-size: 21px !important;
	font-weight: bold;
	margin: auto;
	text-align: center;
	vertical-align: middle;
	padding: 10px;
	}

	.cut
	{
		background-color: #ff7600!important;
	}
	
	.cus
	{
		background-color: #702dd4!important;
	}
	.pre
	{
		background-color: #d31046!important;
	}
	.gen
	{
		background-color: var(--teal)!important
	}
	.gold
	{
		background-color: #fafe05!important;

	}

	
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
	<img class="log_img" src="<?php echo base_url("public/logo/logo.png");?>" alt="but" height="100px" width="100px">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<?php if($this->session->userdata('u_po_id') == 1){?>
			<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/shop_show_t');?>"><h5>ร้านค้า</h5></a>
			<!--<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/additem_show_b');?>"><h5>เพิ่มสินค้า</h5></a>-->
			<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/items_show_t');?>"><h5>คลัง</h5></a>
			<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/orderlist_show_b');?>"><h5>รายการสั่งซื้อ</h5></a>
			<a class="navbar-brand text-white" href="<?php echo site_url('Basic_controller/basic_info_show');?>"><h5>ข้อมูลพื้นฐาน</h5></a>
			<?php }else{ ?>
			<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/shop_show_t');?>"><h5>ร้านค้า</h5></a>
			<a class="navbar-brand text-white" href="<?php echo site_url('Main_controller/orderlist_show_b');?>"><h5>รายการสั่งซื้อ</h5></a>
			<?php }?>
		</ul>
		<!--<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-success my-2 my-sm-2" type="submit">Search</button>
		</form>-->
	</div>
</nav>
