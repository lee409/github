<?php defined('IN_HADMIN') or exit('No permission resources.');?>
<?php include admtpl('admin','header');?>
<style>
.table-list tbody td.th {
	width: 80px;
	border: none
}

.table-list tbody td.tcon {
	width: 150px;
	border: none
}
</style>
<div class="pad-lr-10">
	<div class="table-list">
		<form id="myform" name="myform"
			action="<?php echo aurl('jukebao','settingAD') ?>" method="get">
</form>
		<div class="bk15"></div>
		<th align="left">每个手机号最多接受短信的次数:</th>
		<td>
		<input style="width:40px" type="text" name="smsCount" id="smsCount" value='<?php echo $smsCount[0]['value']; ?>' />
		</td>
		<input type="button" onclick="saveSMSCount()" value="保存" class="button">
		<br>
		<br>
		<tr>
			<th align="left">按经营类型划分的投放次数（次/天）:</th>
		</tr>
<form action="" method="post">
		<table width="100%" cellspacing="0">
			<thead style="width: 100%;">
				<th align="left"  style="width:15%">商场名称</th>
				<?php foreach ( $data as $v ) { foreach ( $v['categorys'] as $vv ) { ?> 
					<th align="left"><?php echo $vv['catename'] ?></th>
				<?php } break; } ?>
			</thead>
			<tbody>
<?php
foreach ( $data as $mid => $row ) {
	?> 
				<tr>
					<td><?php echo $row['marketname'] ?></td>
					<?php foreach ( $row['categorys'] as $v ) { ?> 
						<td><input style="width:25px" type="text" name="markset[<?php echo $mid ?>][<?php echo $v['cateid'] ?>]" id=""
						value='<?php echo $v['sendcount']; ?>' /></td>
					<?php } ?>
				</tr>	
<?php
}
?>
	</tbody>
		</table>
		<div class="bk15"></div>
		<input type="submit" name="dosubmit" value="保存" class="button">
		</form>
	</div>
</div>

<script type="text/javascript">
function showFaq(id){
	var url='<?php echo aurl('jukebao','showFaq',array('id'=>'_ID_')); ?>';
	url=url.replace('_ID_',id);
	admin.win.openwin(url,'查看反馈',800,600);
}

function saveData(){
	alert('未完善 ');
	/*未完善  */
	var count=parseInt($("#smsCount").val());
	var maxcount = 10;
	if(count>0&& count<=maxcount){
		$.ajax({
			url: '<?php echo aurl('jukebao', 'setttingSMSCount'); ?>',
			type: 'POST',
			data:{'count':count},
			dataType: 'json',
			timeout: 1000,
			success: function(result){alert('成功');}
			});
	}else{
		alert('短信条数为1-10之间');		
	}
}

function saveSMSCount(){
	var count=parseInt($("#smsCount").val());
	var maxcount = 10;
	if(count>0&& count<=maxcount){
		$.ajax({
			url: '<?php echo aurl('jukebao', 'setttingSMSCount'); ?>',
			type: 'POST',
			data:{'count':count},
			dataType: 'json',
			timeout: 1000,
			success: function(result){alert('成功');}
			});
	}else{
		alert('短信条数为1-10之间');		
	}
}

</script>