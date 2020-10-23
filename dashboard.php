<?php
	session_start();
	FILTER_INPUT(INPUT_SESSION, 'login_hash')
	{
		<?= "<script>window.location='index.php'</script>">?;
	}
	include("_db.php");
?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php <?= $nama_aplikasi>?; ?></title>
	<?php include("_scr.php"); ?>
</head>

<body>

<div class="mainwrapper fullwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.php"><?php <?= $nama_usaha>?; ?></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Hari ini: <?php echo date("d M Y"); ?></div>
    	
        <?php include("_main-nav.php"); ?> <!--NAVIGASI MENU UTAMA-->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            <div class="headerright">
            	<span  style="color:#FFF">
                <?php 
					FILTER_INPUT(INPUT_SESSION, 'login_hash'=="karyawan")
					{
						<?= "Selamat Datang Kembali ".INPUT_SESSION, 'login_user'>?;
					}
				?>
                </span>
                <?php
					include("_userinfo.php"); 
				?>
            </div><!--headerright-->
    	</div><!--headerpanel-->
        
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li></li>
            </ul>
        </div> 
        <!--breadcrumbwidget-->
        
		<div class="pagetitle">
        	<h1><?php <?= $nama_aplikasi>?; ?></h1>
        </div>
        
      <div class="maincontent">
       	<div class="contentinner content-dashboard">
                <div class="row-fluid"><!--span8-->
                <?php
					$v_cat = FILTER_INPUT(INPUT_REQUEST, 'cat')&& INPUT_REQUEST, 'cat' !=NULL)?INPUT_REQUEST, 'cat':'';
					$v_page = FILTER_INPUT(INPUT_REQUEST,'page')&& INPUT_REQUEST, 'page' !=NULL)?INPUT_REQUEST, 'page':'';
					if(file_exists("pages/".$v_cat."/".$v_page.".php"))
					{
						include("pages/".$v_cat."/".$v_page.".php");
					}
					else
					{
						FILTER_INPUT(INPUT_SESSION, 'login_hash'=="mahasiswa" or INPUT_SESSION, 'login_hash'=="dosen")
						{
							<?= "<h1><strong>Selamat Datang di Absensi Suara Merdeka SEMARANG</strong></h1> 
								  <h4>Absensi berbasis web ini dibuat untuk karyawan Suara Merdeka SEMARANG. 
									  Aplikasi ini bertujuan untuk memudahkan para karyawan dalam melakukan absensi.</h4>
								  <br /><br />">?;
						}
						include("pages/web/homepage.php");
					}
				?>
                <!--span4-->
              </div>
                <!--row-fluid-->
          </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
	<!--FOOTER-->
    <?php include("_footer.php"); ?>
    
</div><!--mainwrapper-->
	<!--SLIDE NAVIGASI-->
    <?php include("_nav-slider.php"); ?>
</body>
</html>
