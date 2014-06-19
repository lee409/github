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
	<form id="myform" name="myform"
		action="<?php echo aurl('jukebao','checkData') ?>" method="get">
<?php 
	$eles =array(
		new ele_text('请选择商场'),	
		new ele_space(2),		
		new ele_select($this->market,$_GET['marketid'],'name=\'marketid\''),
		new ele_space(64),

		new ele_text('投放时间'),
		new ele_space(2), 
		new ele_date('sendtime',date('Y-m-d H:i:s',$_GET['sendtime']!==NULL?strtotime($_GET['sendtime']):mktime(10,0,0,date('m'),date('d')+1,date('Y'))),1),
		new ele_space(4),
			
		new ele_td(),
		new ele_td(),
				
		new ele_text('wifi 用户'),
		new ele_space(6),
		new ele_input('wifiConnTime',$_GET['wifiConnTime'],'name = \'wifiConnTime\''),
		new ele_text('小时内连接过【1-72之间】'),
		new ele_space(10),
			
		new ele_text('性别选择'),
		new ele_space(4),
		new ele_radio($this->gender,$_GET['gender'],'name=\'gender\''),
		new ele_space(34),

		new ele_submit()
	);
	$this->_createsearchhtml($eles);
?>
</form>
	<div class="table-list">
		<form id="myform" name="myform"
			action="<?php echo aurl('jukebao','checkData') ?>" method="post">
			<input type="hidden" name='status' id="status" value='1' />
			<table width="100%" cellspacing="0">
				<thead style="width: 100%;">
					<tr>
						<th align="left">商场名称</th>
						<th align="left">wifi 连接时间</th>
						<th align="left">性别</th>
						<th align="left">手机号码</th>
					</tr>
				</thead>
				<tbody>
<?php 
	foreach($data["data"] as $v) {
?> 
	<tr>
						<td><?php echo $v['name'] ?></td>
						<td><?php echo date('Y-m-d H:i:s',$v['contime']) ?></td>
						<td><?php echo $this->__getGender($v['gender']);?></td>
						<td><?php echo $v['phone']; ?></td>
					</tr>	
<?php 
	} 
?>
	</tbody>
			</table>
			<div id="pages"><?php echo $pagehtml?></div>
		</form>
	</div>
</div>