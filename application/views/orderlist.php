<?php
	// echo "<pre>";
	// print_r($bm);
	// echo "</pre>";
?>
<br>
<center><nav style="width:80%;" class="navbar navbar-expand-lg navbar-light gen">
	<a class="navbar-brand text-white" href="#" data-toggle="collapse" data-target="#collapse2"><h5>รายการสั่งซื้อ</h5></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			
		</ul>
	</div>
</nav></center>
<center><div style="width:80%;" class="collapse show card" id="collapse2">
	<div class="card-body">
		<table class="table table-striped">
			<thead align="center" class="thead-dark">
				<tr>
					<th scope="col">ลำดับ</th>
					<th scope="col">รหัส</th>
					<th scope="col">วันที่</th>
					<th scope="col">ลูกค้า</th>
					<th scope="col">ราคา</th>
					<th scope="col">ดำเนินการ</th>
				</tr>
			</thead>
			<tbody id="tbody_order" align="center">
				<?php foreach($bm as $index=>$value){ ?>	
					<tr>
						<td scope="col"><?php echo $index+1;?></td>
						<td scope="col"><?php echo $value->bil_code;?></td>
						<td scope="col"><?php echo $value->bil_date;?></td>
						<td scope="col"><?php echo $value->pre_name;?><?php echo $value->fist_name;?> <?php echo $value->last_name;?></td>
						<td scope="col"><?php echo $value->od_net;?></td>					
						<td scope="col">
							<button data-toggle="modal" onclick="set_df_modal(<?php echo $value->bil_id;?>,<?php echo $value->bil_code;?>)" data-target="#modal_pfd" type="submit" class="btn btn-info">ปริ้น</button>
						</td>			
					</tr> 	
				<?php } ?>
			</tbody>
		</table>	
	</div>														
</div></center>
<div id="modal_pfd" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm" style="width: 100%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title text-white" id="pfd_title">พิมพ์ใบเสร็จรับเงิน</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('Export_controller/export_pdf_1');?>" method="post">
					<center><button data-toggle="modal" data-target="#modal_pfd" type="submit" class="btn btn-info">ใบเสร็จรับเงิน 1</button><input hidden id="bil_id1" name="bil_id" value=""></center>
				</form>
				<form action="<?php echo site_url('Export_controller/export_pdf_2');?>" method="post">
					<center><button data-toggle="modal" data-target="#modal_pfd" type="submit" class="btn btn-info">ใบเสร็จรับเงิน 2</button><input hidden id="bil_id2" name="bil_id" value=""></center>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
<script>
	function set_df_modal(bil_id,bil_code)
	{
		$("#pfd_title").html(bil_code);
		$("#bil_id1").val(bil_id);
		$("#bil_id2").val(bil_id);
	}
</script>