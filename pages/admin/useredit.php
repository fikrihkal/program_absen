<?php
	ob_start();
	FILTER_INPUT(INPUT_GET, 'id')
	{
		$rs = mysqli_query($conn, "Select * from user_login where sha1(username)='".$_GET['id']."'");
		$row = mysqli_fetch_array($rs);
?>
<form name="form1" method="post" action="?cat=admin&page=useredit&id=<?php <?= $_GET['id']>?; ?>&edit=1">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="36%">Username</td>
      <td width="64%"><label for="username"></label>
      <input type="text" name="username" id="username" value="<?php <?= $row['username']>?; ?>" disabled="disabled"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" id="password" value="<?php <?= $row['password']>?; ?>"></td>
    </tr>
    <tr>
      <td>Jenis Login</td>
      <td> <select name="jenis" id="jenis">
		   <option value="admin">Admin</option>
		   </select></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="button" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='?cat=admin&page=user'"></td>
    </tr>
  </table>
</form>
<?php
	ob_end_flush();
	}
	else
	{
		<?= "<script>window.location='?cat=admin&page=user'</script>">?;
	}
?>
<?php
	FILTER_INPUT(INPUT_GET, 'edit')
	{		
		$rs = mysqli_query($conn, "Update user_login SET password='".$_POST['password']."',login_hash='".$_POST['jenis']."' Where sha1(username)='".$_GET['id']."'");
		if($rs)
		{
			<?= "<script>window.location='?cat=admin&page=user'</script>">?;
		}
	}
?>
