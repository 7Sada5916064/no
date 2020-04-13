<?php
	$this->load->helper('url');
	// echo "<pre>";
	// print_r($cm);
	// echo "</pre>";
?>
<script>
	function insert_cut()
	{
		var cut_name = $("#cut_name").val();
		if(cut_name != '')
		{
			$.ajax(
			{
				type: "POST",
				url :"<?php echo site_url('Basic_controller/insert_customer_type'); ?>",
				data: { cut_name : cut_name
				},
				dataType: "json",
				success: function( json_data )
				{ 
					append_tbody_cut(json_data);
					$("#cut_name").val("");
				}
			});			
		}
		
		
		
	}
	
	function delete_cut(cut_id)
	{
		$.ajax(
		{
			type: "POST",
			url :"<?php echo site_url('Basic_controller/delete_customer_type'); ?>",
			data: { cut_id : cut_id
			},
			dataType: "json",
			success: function( json_data )
			{ 
				append_tbody_cut(json_data)
			}
		});
		
	}
	
	function append_tbody_cut(json_data)
	{
		var text_tbody = "";
		var text_opt = "";
		var count = 1;
		$.each(json_data, function( index, val ) {
			text_tbody += "<tr>";
			text_tbody += "<td><center>"+count+"</center></td>";
			text_tbody += "<td><center>"+val['cut_name']+"</center></td>";
			text_tbody += "<td><center><button onclick='delete_cut("+val['cut_id']+")' class='btn btn-danger'>ลบ</button></center></td>";
			text_tbody += "</tr>";
			count++;
		})
		text_opt += "<option value=''>ประเภท</option>";
		$.each(json_data, function( index, val ) {
			text_opt += "<option value='"+val['cut_id']+"'>"+val['cut_name']+"</option>";
			count++;
		})
		$("#tbody").html(text_tbody);
		$("#cut_id").html(text_opt);
	}
	
	function insert_cus()
	{
		var pre_id = $("#pre_id").val();
		var ge_id = $("#ge_id").val();
		var first_name = $("#first_name").val();
		var last_name = $("#last_name").val();
		var address = $("#address").val();
		var cut_id = $("#cut_id").val();
		
		if(pre_id != '' && ge_id != '' && first_name != '' && last_name != '' && address != '' && cut_id != '')
		{
			$.ajax(
			{
				type: "POST",
				url :"<?php echo site_url('Basic_controller/insert_customer'); ?>",
				data: 
				{		cut_id : cut_id,
					ge_id : ge_id,
					first_name : first_name,
					last_name : last_name,
					address : address,
					pre_id : pre_id
				},
				dataType: "json",
				success: function( json_data )
				{ 
					append_tbody_cus(json_data)
					
					$("#pre_id").val('');
					$("#ge_id").val();
					$("#first_name").val('');
					$("#last_name").val('');
					$("#address").val('');
					$("#cut_id").val('');
				}
			});
		}
	}
	
	function delete_cus(cus_id)
	{
		$.ajax(
		{
			type: "POST",
			url :"<?php echo site_url('Basic_controller/delete_customer'); ?>",
			data: { cus_id : cus_id
			},
			dataType: "json",
			success: function( json_data )
			{ 
				append_tbody_cus(json_data)
			}
		});	
	}
	
	function append_tbody_cus(json_data)
	{
		var text_tbody = "";
		var count = 1;
		$.each(json_data, function( index, val ) {
			text_tbody += "<tr>";
			text_tbody += "<td><center>"+count+"</center></td>";
			text_tbody += "<td><center>"+val['pre_name']+""+val['fist_name']+" "+val['last_name']+"</center></td>";
			text_tbody += "<td><center>"+val['cut_name']+"</center></td>";
			text_tbody += "<td><center>"+val['address']+"</center></td>";
			text_tbody += "<td><center><button onclick='delete_cus("+val['cus_id']+")' class='btn btn-danger'>ลบ</button></center></td>";
			text_tbody += "</tr>";
			count++;
		})
		$("#tbody_cus").html(text_tbody);
	}
	
	function insert_pre()
	{
		var pre_name = $("#pre_name").val();
		if(pre_name != '')
		{
			$.ajax(
			{
				type: "POST",
				url :"<?php echo site_url('Basic_controller/insert_prefix'); ?>",
				data: 
				{		pre_name : pre_name
				},
				dataType: "json",
				success: function( json_data )
				{ 
					append_tbody_pre(json_data);
					$("#pre_name").val('');
				}
			});
		}
	}
	
	function delete_pre(pre_id)
	{
		$.ajax(
		{
			type: "POST",
			url :"<?php echo site_url('Basic_controller/delete_prefix'); ?>",
			data: { pre_id : pre_id
			},
			dataType: "json",
			success: function( json_data )
			{ 
				append_tbody_pre(json_data)
			}
		});
		
	}
	
	function append_tbody_pre(json_data)
	{
		var text_tbody = "";
		var text_opt = "";
		var count = 1;
		$.each(json_data, function( index, val ) {
			text_tbody += "<tr>";
			text_tbody += "<td><center>"+count+"</center></td>";
			text_tbody += "<td><center>"+val['pre_name']+"</center></td>";
			text_tbody += "<td><center><button onclick='delete_pre("+val['pre_id']+")' class='btn btn-danger'>ลบ</button></center></td>";
			text_tbody += "</tr>";
			count++;
		})
		text_opt += "<option value=''>คำนำหน้า</option>";
		$.each(json_data, function( index, val ) {
			text_opt += "<option value='"+val['pre_id']+"'>"+val['pre_name']+"</option>";
			count++;
		})
		$("#tbody_pre").html(text_tbody);
		$("#pre_id").html(text_opt);
	}
	
	function insert_gen()
	{
		var ge_name = $("#ge_name").val();
		if(ge_name != '')
		{
			$.ajax(
			{
				type: "POST",
				url :"<?php echo site_url('Basic_controller/insert_gender'); ?>",
				data: 
				{		ge_name : ge_name
				},
				dataType: "json",
				success: function( json_data )
				{ 
					append_tbody_gen(json_data)
					$("#ge_name").val('');
				}
			});
		}
	}
	
	function delete_gen(ge_id)
	{		
		$.ajax(
		{
			type: "POST",
			url :"<?php echo site_url('Basic_controller/delete_gender'); ?>",
			data: 
			{		ge_id : ge_id
			},
			dataType: "json",
			success: function( json_data )
			{ 
				append_tbody_gen(json_data)
			}
		});
	}
	
	function append_tbody_gen(json_data)
	{
		var text_tbody = "";
		var text_opt = "";
		var count = 1;
		$.each(json_data, function( index, val ) {
			text_tbody += "<tr>";
			text_tbody += "<td><center>"+count+"</center></td>";
			text_tbody += "<td><center>"+val['ge_name']+"</center></td>";
			text_tbody += "<td><center><button onclick='delete_gen("+val['ge_id']+")' class='btn btn-danger'>ลบ</button></center></td>";
			text_tbody += "</tr>";
			count++;
		})
		text_opt += "<option value=''>เพศ</option>";
		$.each(json_data, function( index, val ) {
			text_opt += "<option value='"+val['ge_id']+"'>"+val['ge_name']+"</option>";
			count++;
		})
		$("#tbody_gen").html(text_tbody);
		$("#ge_id").html(text_opt);
	}
</script>
<div>
</div>
<br>
<br>
<div class="col-md-12">
	<div class="row  col-md-12" >
		<div class="form-group row col-md-12">
			<div class="col-md-12">
				<center><h1>ข้อมูลพื้นฐาน</h1></center>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 ">
	<div class="row  col-md-12" >
		<div class="form-group row col-md-12">
			<div class="col-md-6 ">
				<nav class="navbar navbar-expand-lg navbar-light cus">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse2"><h5>ข้อมูลลูกค้า</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							
						</ul>
						
						<button class="btn btn-success my-2 my-sm-2" onclick="insert_cut()" data-toggle="modal" data-target="#modal_approve">เพิ่ม</button>
					</div>
				</nav>
				<div class="col-md-12 card collapse " id="collapse2">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>ชื่อ-นามสกุล</center></th>
									<th><center>ประเภท</center></th>
									<th><center>ที่อยู่</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_cus">
								<?php foreach($cm as $index=>$val){ ?>
									<tr>
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->pre_name,$val->fist_name,' ',$val->last_name; ?></center></td>
										<td><center><?php echo $val->cut_name; ?></center></td>
										<td><center><?php echo $val->address; ?></center></td>
										<td><center><button onclick="delete_cus(<?php echo $val->cus_id; ?>)" class="btn btn-danger">ลบ</button></center></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
			<div class="col-md-6 ">
				<nav class="navbar navbar-expand-lg navbar-light cut">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse1"><h5>ข้อมูลประเภทลูกค้า</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							
						</ul>
						<input class="form-control mr-sm-2" id="cut_name" placeholder="ประเภทลูกค้า">
						<button class="btn btn-success my-2 my-sm-2" onclick="insert_cut()" type="submit">เพิ่ม</button>
					</div>
				</nav>
				<div class="col-md-12 card collapse " id="collapse1">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>ประเภท</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_cut">
								<?php foreach($ctm as $index=>$val){ ?>
									<tr>
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->cut_name; ?></center></td>
										<td><center><button onclick="delete_cut(<?php echo $val->cut_id; ?>)" class="btn btn-danger">ลบ</button></center></td>
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
<div class="col-md-12 ">
	<div class="row  col-md-12" >
		<div class="form-group row col-md-12">
			<div class="col-md-6 ">
				<nav class="navbar navbar-expand-lg navbar-light pre">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse3"><h5>ข้อมูลคำนำหน้าชื่อ</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							
						</ul>
						<input class="form-control mr-sm-2" id="pre_name" placeholder="คำนำหน้า">
						<button class="btn btn-success my-2 my-sm-2" onclick="insert_pre()" type="submit">เพิ่ม</button>
					</div>
				</nav>
				<div class="col-md-12 card collapse " id="collapse3">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>คำนำหน้า</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_pre">
								<?php foreach($pm as $index=>$val){ ?>
									<tr>
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->pre_name; ?></center></td>
										<td><center><button onclick="delete_pre(<?php echo $val->pre_id; ?>)" class="btn btn-danger">ลบ</button></center></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6 ">
				<nav class="navbar navbar-expand-lg navbar-light gen">
					<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse4"><h5>ข้อมูลเพศ</h5></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							
						</ul>
						<input class="form-control mr-sm-2" id="ge_name" placeholder="เพศ">
						<button class="btn btn-success my-2 my-sm-2" onclick="insert_gen()" type="submit">เพิ่ม</button>
					</div>
				</nav>
				<div class="col-md-12 card collapse " id="collapse4">
					<div class="col-md-12 card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th><center>ลำดับ</center></th>
									<th><center>เพศ</center></th>
									<th><center>ดำเนินการ</center></th>
								</tr>
							</thead>
							<tbody id = "tbody_gen">
								<?php foreach($gm as $index=>$val){ ?>
									<tr>
										<td><center><?php echo $index+1; ?></center></td>
										<td><center><?php echo $val->ge_name; ?></center></td>
										<td><center><button onclick="delete_gen(<?php echo $val->ge_id; ?>)" class="btn btn-danger">ลบ</button></center></td>
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
<div id="modal_approve" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg" style="width: 100%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header cus">
				<h4 class="modal-title text-white">เพิ่มข้อมูลลูกค้า</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="row  col-md-12" >
						<div class="form-group row col-md-12">
							<div class="col-md-2">
								<select class="form-control" id="pre_id">
									<option value="">คำนำหน้า</option>
									<?php foreach($pm as $index=>$val){ ?>
										<option value="<?php echo $val->pre_id; ?>"><?php echo $val->pre_name; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-5">
								<input placeholder="ชื่อ" class="form-control" id="first_name">
							</div>
							<div class="col-md-5">
								<input placeholder="นามสกุล" class="form-control" id="last_name">
							</div>
						</div>
						<div class="form-group row col-md-12">
							<div class="col-md-6">
								<select class="form-control" id="ge_id">
									<option value="">เพศ</option>
									<?php foreach($gm as $index=>$val){ ?>
										<option value="<?php echo $val->ge_id; ?>"><?php echo $val->ge_name; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6">
								<select class="form-control" id="cut_id">
									<option value="">ประเภท</option>
									<?php foreach($ctm as $index=>$val){ ?>
										<option value="<?php echo $val->cut_id; ?>"><?php echo $val->cut_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row col-md-12">
							<div class="col-md-12">
								<input placeholder="ที่อยู่" class="form-control" id="address">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="insert_cus()" data-dismiss="modal">บันทึก</button>
			</div>
		</div>
	</div>
</div>
