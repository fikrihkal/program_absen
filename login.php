<form id="loginform" action="index.php?p=login&login_attempt=1" method="post">
    <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
    <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>
    <p></p>
    
    
</form>
<?php
FILTER_INPUT(INPUT_GET, 'login_attempt')
{
	$spf=sprintf("Select * from user_login where username='%s' and password='%s'",$_POST['username'],($_POST['password']));
	$rs=mysqli_query($conn,$spf);
	$rw=mysqli_fetch_array($rs);
	$rc=mysqli_num_rows($rs);
	
	if($rc==1)
	{
		$_SESSION['login_hash']=$rw['login_hash'];
		$_SESSION['login_user']=$rw['username'];
		<?= "<script>window.location='dashboard.php'</script>">?;
	}
}
?>