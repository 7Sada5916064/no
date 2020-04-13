<script>
	function preview_image(event)
	{
		var reader = new FileReader();
		var imageField = document.getElementById('imagePreview');
		reader.onload = function(){
			if(reader.readyState == 2){
				imageField.src = reader.result;
			}
		}
		reader.readAsDataURL(event.target.files[0]);
		
	}
	
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
		$("#it_name_edit").val(it_name);
		$("#it_detail_edit").val(it_detail);
		$("#unit_edit").val(unit);
		$("#it_un_id_edit").val(it_un_id);
		$("#imagePreview_edit").attr('src',past);
	}
	
</script>
<style>	
	.image-preview{
	width: 300px;
	min-height: 100px;
	border: 2px solid #dddddd;
	margin-top: 15px;
	
	/* Default text */
	display: flex;
	align-items: center;
	justify-content: center;
	font-weight: bold;
	color: #cccccc
	}
	
	.gallery{
	margin: 10px 50px
	}
	
	.gallery img{
	transition: 0.2s;
	padding: 15px;
	width: 200px;
	height: 200px;
	}
	.gallery img:hover{	
	transform: scale(1.1);
	}
	
</style>

<div class="gallery col-md-12">
	<div class="row  col-md-12" >
		<div class="form-group row col-md-12">
			<?php
				foreach($itm as $index=>$value)
				{ ?>
				<div class="col-md-2">
					<form action="<?php echo site_url('Main_controller/delete_item');?>" method="post">
						<input hidden name="it_id" value="<?php echo $value->it_id; ?>">
						<input hidden name="it_img" value="<?php echo $value->it_img; ?>">
						<center><a onclick='set_modal("<?php echo $value->it_id;?>","<?php echo $value->it_name;?>","<?php echo $value->it_detail;?>","<?php echo $value->unit;?>","<?php echo $value->it_un_id;?>","<?php echo base_url("public/image/$value->it_img");?>","<?php echo $value->it_img;?>")' data-toggle="modal" data-target="#modal_info_item">
						<img src="<?php echo base_url("public/image/$value->it_img");?>" alt="but" height="100px" width="100px"></a></center>
						<center><button type="submit" class="btn btn-danger">ลบ</button></center>
					</form>
				</div>
			<?php } ?>
			<div class="col-md-2">
				<center><button data-toggle="modal" data-target="#modal_insert_item" class="btn btn-info">เพิ่มสินค้า</button></center>
			</div>
		</div>
	</div>
</div>
<form action="<?php echo site_url('Main_controller/insert_item');?>" method="post" enctype="multipart/form-data">
	<div id="modal_insert_item" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" style="width: 100%;">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header cus">
					<h4 class="modal-title text-white">เพิ่มสินค้า</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" id="insert_modal">
					<div class="wrapper">
						<div class="inner">
							<center><div  class="image-preview">
								<img id="imagePreview" src="" alt="สินค้า" class="image-preview__image">
								<span class="image-preview__default-text"></span>
							</div></center>
							<p><input onchange="preview_image(event)" type="file" id="it_img" name="it_img" required accept="image/*"></p>
							<p><input required type="text" class="form-control" placeholder="ชื่อสินค้า"  name="it_name"></p>
							<div class="row">
								<div class="col-sm">
									<input required type="text" class="form-control" placeholder="จำนวน"  name="unit">
								</div>
								<div class="col-sm">
									<select required name="it_un_id" id="it_un_id" class="form-control">
										<option value="">หน่วย</option>
										<?php foreach($um as $index=>$value){ ?>
											<option value="<?php echo $value->un_id?>"><?php echo $value->un_name?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<br>
							<textarea name="it_detail" required class="form-control" id="propertyitem" rows="3" placeholder="คุณสมบัติ" ></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button onclick="test()" type="submit" class="btn btn-success" >บันทึก</button>
				</div>
			</div>
		</div>
	</div>
</form>
<form action="<?php echo site_url('Main_controller/update_item');?>" method="post" enctype="multipart/form-data">
<div id="modal_info_item" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg" style="width: 100%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header cut">
				<h4 class="modal-title text-white">รายละเอียด</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="insert_modal">
				<div class="wrapper">
					<div class="inner">
						<center><h1>รายละเอียด</h1></center>
						<center><div  class="image-preview">
							<img id="imagePreview_edit" src="" alt="สินค้า" class="image-preview__image">
							<span class="image-preview__default-text"></span>
						</div></center>
						<p><input onchange="preview_image_edit(event)" type="file" id="it_img" name="it_img" required accept="image/*"></p>
						<p><input required type="text" class="form-control" placeholder="ชื่อสินค้า" id="it_name_edit" name="it_name"></p>
						<div class="row">
							<div class="col-sm">
								<input required type="text" class="form-control" placeholder="จำนวน" id="unit_edit" name="unit">
							</div>
							<div class="col-sm">
								<select required name="it_un_id" id="it_un_id_edit" class="form-control">
									<option value="">หน่วย</option>
									<?php foreach($um as $index=>$value){ ?>
										<option value="<?php echo $value->un_id?>"><?php echo $value->un_name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br>
						<textarea id="it_detail_edit" name="it_detail" required class="form-control" id="propertyitem" rows="3" placeholder="คุณสมบัติ" ></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input hidden name="it_id" id="it_id_edit">
				<input hidden name="it_img_edit" id="it_img_edit">
				<button type="submit" class="btn btn-warning" >แก้ไข</button>
				
			</div>
		</div>
	</div>
</div>
</form>															