<?php defined('IN_HADMIN') or exit('No permission resources.');?>
<?php include admtpl('admin','header');?>
<style>
.table-list tbody td.th{width:80px;border:none}
.table-list tbody td.tcon{width:150px;border:none}
</style>
<div class="pad-lr-10">
<form id="myform" name="myform" action="<?php echo aurl('jukebao','listEffect') ?>" method="get">
<?php 
	$eles =array(
		new ele_text('请选择商场'),	
		new ele_space(2),		
		new ele_select($this->market,$_GET['marketid'],'name=\'marketid\''),
		new ele_space(4),
		new ele_submit()
	);
	$this->_createsearchhtml($eles);
?>
</form>
<div class="table-list">
<form id="myform" name="myform" action="<?php echo aurl('jukebao','listEffect') ?>" method="post">
<input type="hidden" name='status' id="status" value='1'/>
<table  width="100%" cellspacing="0">
	<thead style="width: 100%;">
			<tr>
				<th align="left">商户名称</th>
				<th align="left">投放渠道</th>
				<th align="left">有效期</th>
				<th align="left">提交时间</th>
				<th align="left">已投放（单位/条）</th>
				<th align="left">投放时间</th>
				<th align="left">操作</th>
				<th align="left">状态</th>
			</tr>
	</thead>
	<tbody>
<?php 
	foreach($data["data"] as $v) {
?> 
	<tr>
		<td><?php echo $v['fullname'] ?></td>
		<td><?php $this->__getchannel($v['channel']); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$v['timefrom']).' - '.date('Y-m-d H:i:s',$v['timeto']); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></td>
		<td><?php echo $v['sendcount'] ?></td>
		<td><?php echo $v['sendtime']; ?></td>
		<td  class="blue"><a href="javascript:showEffect(<?php echo $v['id'];?>)" >查看</a></td>	
		<td><?php $this->__getstatus($v['status']); ?></td>
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

<script type="text/javascript">
function showEffect(id){
	var url='<?php echo aurl('jukebao','showEffect',array('id'=>'_ID_')); ?>';
	url=url.replace('_ID_',id);
	admin.win.openwin(url,'查看投放效果',800,600);
}
</script>