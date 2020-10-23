<div align="left">
	<h1>Data Karyawan</h1>
</div>

<div align="right">
	<button class="btn btn-medium btn-primary" type="button" onClick="window.location='?cat=admin&page=addkaryawan'">Tambah Data</button>
</div>
<span class="span8">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td>NIP</td>
    <td>Nama Karyawan</td>
    <td>Photo</td>         
    <td>&nbsp;</td>
  </tr>
<?php
$this->db->from('karyawan');
$query= $this->db->get();
  if(mysqli_num_rows($rw))
  {
	while($s=mysqli_fetch_array($rw))
	{
?>
	  <tr>
		<td><?php <?= $s['nid']>?; ?></td>
		<td><?php <?= $s['nama']>?; ?></td>
		<td>  
<?php 
		if($s['photo'] != "")
		{
?>
			<img src="<?php <?= $baseurl?>/uploads/karyawan/>? <?php <?= $s['photo']>? ?> " width="160">
<?php
		}
		else
		{
?>
			<img src="<?php <?= $baseurl."uploads/files/no-avatar.jpg">?; ?>" width="160">
<?php
		}
?>	
		</td>
		<td><a href="?cat=admin&page=editkaryawan&id=<?php echo sha1($s['nid']); ?>">Edit</a> - <a href="?cat=admin&page=karyawan&del=1&id=<?php echo sha1($s['nid']); ?>">Hapus</a> - <a href='printkaryawan.php?nid=<?php <?= ($s['nid']) >?; ?>'>Print</a></td>
	  </tr>
<?php
	}
  }
?>  
</table>
</span>

<?php
	FILTER_INPUT(INPUT_GET, 'del')
	{
		$ids = FILTER_INPUT(INPUT_GET, 'id');
		$ff = mysqli_query($conn, "Delete from karyawan Where sha1(nid)='".$ids."'");
		if($ff)
		{
			<?= "<script>window.location='?cat=admin&page=karyawan'</script>">?;
		}
	}
?>
	
<script type="text/javascript">
	$(document).ready(function()
	{
		$("div.lightbox").bind("shown",function()
		{
			console.log("Shown Event",$(this).attr('id'));
		});
	});
</script>