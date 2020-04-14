<style>
	.box {
	border-collapse: collapse;
	}
	
	.box{
	border: 1px solid black;
	}
	p.normal {
	font-weight: normal;
	}
	
	p.thick {
	font-weight: bold;
	}
	
	p.thicker {
	font-weight: 900;
	}
	
</style>
<?php
	$bill_total = 0;
	$bill_unit = 0;
	$bill_per_unit = 0;
	$bill_code = $bm[0]->bil_code;
	$cus_name = $bm[0]->pre_name.$bm[0]->fist_name.' '.$bm[0]->last_name;
	$bill_date = $bm[0]->bil_date;
	//print_r($bi);
	
	foreach($bi as $index=>$value)
	{
		$bill_total += $value->od_net;
		$bill_unit += $value->od_unit;
		$bill_per_unit += $value->od_per_unit;
	}
?>
<div style='width:100%; font-size:16pt;'>
	<div style='width:39%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:61%; float: left;'>
		<img class="log_img" src="<?php echo base_url("public/logo/logo.png");?>" alt="but" height="100px" width="100px">
	</div>
	<div style='width:40%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:60%; float: left;'>
		<b><font style="font-size:11pt;">น้ำดื่ม เอส.พี.ที</font></b>
	</div>
	<div style='width:22%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:78%; float: left;'>
		<font style="font-size:11pt;">199 หมู่ 13 ต.สระขวัญ อ.เมืองสระแก้ว จ.สระแก้ว 27000</font>
	</div>
	<div style='width:30%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:70%; float: left;'>
		<font style="font-size:11pt;">โทร. 087-025-3522 หรือ 061-398-3522</font>
	</div>
</div>
<div style='width:100%;'>
	<table width="100%" class="box">
		<thead>
			<tr class="">
				<td class="box" rowspan="2" style='text-align:left;'>ลูกค้า : <?php echo $cus_name; ?></td>
				<td class="" style='text-align:left;'>เลขที่ : <?php echo $bill_code; ?></td>
			</tr>
			<tr class="">
				<td class="" style='text-align:left;'>วันที่ : <?php echo $bill_date; ?></td>
			</tr>
		</thead>
	</table>
</div>
<br>
<div style='width:100%;'>
	<table width="100%" class="box">
		<thead>
			<tr class="box">
				<td class="box" style='text-align:center;'>ลำดับ</td>
				<td class="box" style='text-align:center;'>ราการ</td>
				<td class="box" style='text-align:center;'>จำนวน</td>
				<td class="box" style='text-align:center;'>ราคา</td>
				<td class="box" style='text-align:center;'>จำนวนเงิน</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($bi as $index=>$value){ ?>
				<tr class="box">
					<td class="box" style='text-align:center;'><?php echo $index+1; ?></td>
					<td class="box" style='text-align:center;'><?php echo $value->it_name; ?> <?php echo $value->pro_name; ?></td>
					<td class="box" style='text-align:center;'><?php echo $value->od_unit; ?></td>
					<td class="box" style='text-align:center;'><?php echo $value->od_per_unit; ?></td>
					<td class="box" style='text-align:center;'><?php echo $value->od_net; ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tr >
			<td  colspan='2' align="center">รวม</td>
			<td class="box" style='text-align:center;'><?php echo $bill_unit; ?></td>
			<td class="box" style='text-align:center;'><?php echo $bill_per_unit; ?></td>
			<td class="box" style='text-align:center;'><?php echo $bill_total; ?></td>
		</tr>
	</table>
</div>
<br>
<div style='width:100%; font-size:16pt;'>
	<div style='width:15%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:30%; float: left;'>
		<font style="font-size:11pt;">....................................</font>
	</div>
	<div style='width:15%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:30%; float: left;'>
		<font style="font-size:11pt;">....................................</font>
	</div>
	
	<div style='width:21%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:36%; float: left;'>
		<font style="font-size:11pt;">ผู้ส่งสินค้า</font>
	</div>
	<div style='width:9%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:33%; float: left;'>
		<font style="font-size:11pt;">ผู้รับสินค้า</font>
	</div>
	
	<div style='width:15%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:30%; float: left;'>
		<font style="font-size:11pt;">....................................</font>
	</div>
	<div style='width:15%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:30%; float: left;'>
		<font style="font-size:11pt;">....................................</font>
	</div>
	
	<div style='width:21%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:36%; float: left;'>
		<font style="font-size:11pt;">วัน/เดือน/ปี</font>
	</div>
	<div style='width:9%; float: left;'>
		<?php echo nbs(1); ?>
	</div>
	<div style='width:33%; float: left;'>
		<font style="font-size:11pt;">วัน/เดือน/ปี</font>
	</div>
</div>