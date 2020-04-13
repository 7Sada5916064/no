<script>
	function preview_image_edit(event)
	{
		var reader = new FileReader();
		var imageField = document.getElementById('imagePreview_edit');
		reader.onload = function(){
			if(reader.readyState == 2){
				imageField.src = reader.result;
			}
		}
		reader.readAsDataURL(event.target.files[0]);
		
	}
	
	function set_modal(it_id,it_name,it_detail,unit,it_un_id,past,it_img)
	{
		$("#it_id_edit").val(it_id);
		$("#it_img_edit").val(it_img);
		$("#item_title").html(it_name);
		$("#it_name").val(it_name);
		$("#it_detail_edit").val(it_detail);
		$("#unit_edit").attr("max",unit);
		$("#check_unit").val(unit);
		var sum_unt = "สินค้าเหลือจำนวน "+unit;
		$("#sum_unit").html(sum_unt);
		$("#it_un_id_edit").val(it_un_id);
		$("#it_un_id_p").val(it_un_id);
		$("#imagePreview_edit").attr('src',past);
	}
	
	function calculate()
	{
		var price_per_unit = parseInt($('#price_per_unit').val());
		var unit = parseInt($('#unit_edit').val());
		
		
		$('#sum_price').val(price_per_unit*unit);
	}
	
	$( document ).ready(function() {
		var count_item = 1;
		$("#set_basket").click(function()
		{
			var od_cus_id = '';
			var radios = document.getElementsByName('cus_id');
			$(".select_pc:checked").each(function(index){
				od_cus_id = $(this).val();
			});
			var od_per_unit = $('#price_per_unit').val();
			var od_unit = $('#unit_edit').val();
			
			var od_net = parseInt($('#sum_price').val());
			var od_it_id = $('#it_id_edit').val();
			var it_name = $('#it_name').val();
			
			var it_name = $('#it_name').val();
			if($('#bill_price').val() != '')
			{	
				var bill_price = parseInt($('#bill_price').val());
			}
			else
			{
				var bill_price = 0;
			}
			
			
			if(od_per_unit == '' || od_unit == '' || od_net == '' || od_it_id == '')
			{
				$("#set_basket").attr("data-dismiss","");
				alert("กรอกข้อมูลให้ครบ");
				
			}
			else
			{
				if(od_unit <= $("#check_unit").val())
				{
					var  txt_tr_basket = "";
					txt_tr_basket+= "<tr id='tr_basket"+count_item+"'>";
					txt_tr_basket+= 	"<td><center>"+it_name+"<input hidden name='od_it_id[]' value='"+od_it_id+"'></center></td>";
					txt_tr_basket+= 	"<td><center>"+od_per_unit+"<input hidden name='od_per_unit[]' value='"+od_per_unit+"'></center></td>";
					txt_tr_basket+= 	"<td><center>"+od_unit+"<input hidden name='od_unit[]' value='"+od_unit+"'></center></td>";
					txt_tr_basket+= 	"<td><center>"+od_net+"<input hidden name='od_net[]' value='"+od_net+"'></center></td>";
					txt_tr_basket+= 	"<td><center><button onclick='delete_tr("+count_item+","+od_net+")' class='btn btn-danger'>ลบ</button></center></td>";
					txt_tr_basket+= "</tr>";
					$("#tbody_basket").append(txt_tr_basket);
					$("#set_basket").attr("data-dismiss","modal");
					$("#od_cus_id").val(od_cus_id);
					
					$("#bill_price").val(bill_price+od_net);
					count_item++;
				}
				else
				{
					$("#set_basket").attr("data-dismiss","");
					alert("เลือกจำนวนเกิน");
				}
				
			}
		});
		
		$("#cus_id").click(function()
		{
			var od_cus_id = '';
			var radios = document.getElementsByName('cus_id');
			$(".select_pc:checked").each(function(index){
				od_cus_id = $(this).val();
			});
			$("#od_cus_id").val(od_cus_id);
		});
	});
	
	function delete_tr(count_item,od_net)
	{
		console.log("#tr_basket"+count_item);
		$("#tr_basket"+count_item).remove();
		var bill_price = parseInt($('#bill_price').val());
		$("#bill_price").val(bill_price-od_net);
	}
	
	function validateForm() {
		var x = $("#od_cus_id").val();
		if (x == "") {
			alert("เลือกลูกค้า");
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
<style>	
	
	
	.gallery img{
	transition: 0.2s;
	padding: 15px;
	width: 150px;
	height: 150px;
	}
	.gallery img:hover{	
	transform: scale(1.1);
	}
	
</style>
<div class="col-md-12">
	<div class="row  col-md-12" >
		<div class="form-group row col-md-12">
			<div class="col-md-12">
				<p><center><h1>ร้านค้า</h1></center></p>
			</div>
		</div>
	</div>	
	<div class="row  col-md-12" >
		<div class="form-group row col-md-6">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light cut">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse2"><h5>สินค้า</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
				<div class="col-md-12 card collapse show" id="collapse2">
					<div class="col-md-12 card-body">
						<div class="gallery col-md-12">
							<div class="row  col-md-12" >
								<div class="form-group row col-md-12">
									<?php
										foreach($itm as $index=>$value)
										{ ?>
										<div class="col-md-4">
											<center><a onclick='set_modal("<?php echo $value->it_id;?>","<?php echo $value->it_name;?>","<?php echo $value->it_detail;?>","<?php echo $value->unit;?>","<?php echo $value->it_un_id;?>","<?php echo base_url("public/image/$value->it_img");?>","<?php echo $value->it_img;?>")' data-toggle="modal" data-target="#modal_info_item">
											<img src="<?php echo base_url("public/image/$value->it_img");?>" alt="but" height="100px" width="100px"></a></center>
										</div>
									<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row col-md-6">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light gen">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse3"><h5>ตะกร้า</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
				<form name="myForm" action="<?php echo site_url('Main_controller/insert_order');?>" onsubmit="return validateForm()" method="post">
					<input hidden id="od_cus_id" name="od_cus_id">
					<div class="col-md-12 card collapse show" id="collapse3">
						<div class="col-md-12 card-body">
							<table class="table table-striped">
								<thead class="thead-dark">
									<tr>
										<th><center>สินค้า</center></th>
										<th><center>ราคา</center></th>
										<th><center>จำนวน</center></th>
										<th><center>รวม</center></th>
										<th><center>ดำเนินการ</center></th>
									</tr>
								</thead>
								<tbody id = "tbody_basket">
									
								</tbody>
								<tfoot>
									<tr class="gen">
										<td colspan="2"><center><input id="bill_price" name="bill_price" placeholder="ราคารวม" type="number" class="form-control"></center></td>
										<td colspan="2"><center>บาท</center></td>
										<td><center><button type="submit" value="Submit" class="btn btn-success" >ซื้อ</button></center></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="form-group row col-md-6">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light cus">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse1"><h5>ลูกค้าธรรมดา</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
				<div class="col-md-12 card collapse" id="collapse1">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>ชื่อ-นามสกุล</center></th>
									<th><center>ประเภท</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_cus"><?php $count = 0; ?>
								<?php foreach($cm as $index=>$val){ ?>
									<tr id="tr_cus<?php echo $index;?>" class="">
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->pre_name,$val->fist_name,' ',$val->last_name; ?></center></td>
										<td><center><?php echo $val->cut_name; ?></center></td>
										<td><center><input class="select_pc" value="<?php echo $val->cus_id; ?>" id="cus_id" name="cus_id[]" type="radio"></center></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row col-md-6">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light gold">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse4"><h5>ลูกค้าพิเศษ</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
				<div class="col-md-12 card collapse " id="collapse4">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>ชื่อ-นามสกุล</center></th>
									<th><center>ประเภท</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_cus">
								<?php foreach($cm as $index=>$val){ ?>
									<tr>
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->pre_name,$val->fist_name,' ',$val->last_name; ?></center></td>
										<td><center><?php echo $val->cut_name; ?></center></td>
										<td><center><input type="checkbox"></center></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal_info_item" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg" style="width: 100%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header cut">
				<h4 class="modal-title text-white" id="item_title">รายละเอียด</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="insert_modal">
				<div class="wrapper">
					<div class="inner">
						
						<center><div  class="image-preview">
							<img id="imagePreview_edit" src="" alt="สินค้า" class="image-preview__image">
							<span class="image-preview__default-text"></span>
						</div></center><br>
						
						<div class="row">
							<div class="col-sm">
								<p id="sum_unit"></p>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm">
								<p><input onkeyup="calculate()" required type="number" class="form-control" placeholder="ราคาต่อ" id="price_per_unit" name="od_per_unit"></p>
							</div>
							<div class="col-sm">
								<select disabled required name="it_un_id" id="it_un_id_p" class="form-control">
									<option value="">หน่วย</option>
									<?php foreach($um as $index=>$value){ ?>
										<option value="<?php echo $value->un_id?>"><?php echo $value->un_name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<input max="" required onkeyup="calculate()" type="number" class="form-control" placeholder="จำนวน" id="unit_edit" name="od_unit">
							<input hidden id="check_unit">
						</div>
						<div class="col-sm">
							<select disabled required name="it_un_id" id="it_un_id_edit" class="form-control">
								<option value="">หน่วย</option>
								<?php foreach($um as $index=>$value){ ?>
									<option value="<?php echo $value->un_id?>"><?php echo $value->un_name?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<p><input required type="number" class="form-control" placeholder="ราคาทั่งหมด" id="sum_price" name="od_net"></p>
						</div>
						<div class="col-sm">
							บาท
						</div>
					</div>
					<br>
					<textarea readonly id="it_detail_edit" name="it_detail" required class="form-control" id="propertyitem" rows="3" placeholder="คุณสมบัติ" ></textarea>
				</div>
			</div>
			
			<div class="modal-footer">
				<input hidden name="od_it_id" id="it_id_edit">
				<input hidden name="it_img_edit" id="it_img_edit">
				<input hidden name="it_name" id="it_name" value="">
				<button data-dismiss="" id="set_basket" class="btn btn-success" >ซื้อ</button>
			</div>
		</div>
	</div>
</div>