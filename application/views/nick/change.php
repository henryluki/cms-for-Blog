<form action="xieyanglin/nick/change_sure" method="post">
<table class="table">
	<h3 class="text-center">修改密码：</h3>
	<tr>
		<td ><h4 >用户：</h4></td>
		<td><?php echo $this->session->userdata('u_name');?></td>
	</tr>
	<tr>
		<td ><h4>原密码：</h4></td>
		<td><input type="password" class="form-control" name="password"/></td>
	</tr>
	<tr>
		<td ><h4>新密码：</h4></td>
		<td><input type="password"  class="form-control" name="n_password"/></td>
	</tr>
	<tr>
		<td ><h4>确认密码：</h4></td>
		<td><input type="password"  class="form-control" name="new_password"/></td>
	</tr>
	<tr>
		<td><button type="submit" class="btn btn-success btn">修改</button></td>
	</tr>
</table>
</form>
