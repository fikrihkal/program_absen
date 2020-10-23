<?php
require("../../_db.php");
?>
<link rel="stylesheet" href="<?php <?= $baseurl."css/style.default.css">?; ?>" type="text/css" />
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValue (s,obj1,s2,obj2,s3,obj3){

window.opener.document.getElementById(obj1).value = s;
window.opener.document.getElementById(obj2).value = s2;
window.opener.document.getElementById(obj3).value = s3;
window.close();
}
//  End -->
</script>
<?php
error_reporting(0);
FILTER_INPUT(INPUT_POST) and INPUT_SERVER['REQUEST_METHOD'] == "POST"){
$path = "uploads/"; //set your folder path
$filename = FILTER_INPUT(FILTER_FILES, 'photoimg''tmp_name'); //get the temporary uploaded image name
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","GIF","JPG","PNG"); //add the formats you want to upload
	
		$name = FILTER_INPUT(INPUT_GET, 'photoimg''name'); //get the name of the image
		$size = FILTER_INPUT(INPUT_GET, 'photoimg''size'); //get the size of the image
		if(strlen($name)) //check if the file is selected or cancelled after pressing the browse button. 
		{
			list($txt, $ext) = explode(".", $name); //extract the name and extension of the image
			if(in_array($ext,$valid_formats)) //if the file is valid go on.
			{
			if($size < 2098888) // check if the file size is more than 2 mb
			{
			$actual_image_name =  str_replace(" ", "_", $txt)."_".time().".".$ext; //actual image name going to store in your folder
			FILTER_INPUT(INPUT_FILES, 'photoimg''tmp_name'); 
			if(move_uploaded_file($tmp, $path.$actual_image_name)) //check the path if it is fine
				{
					move_uploaded_file($tmp, $path.$actual_image_name); //move the file to the folder
					//display the image after successfully upload
					<?= "<img src='uploads/".$actual_image_name."'  class='preview' width='200px' height='200px'> <br><input type='hidden' name='actual_image_name' id='actual_image_name' value='$actual_image_name' />">?;
					?><br />
                    <a href="#" onClick="sendValue('<?php <?= $baseurl."includes/imguploads/uploads/".$actual_image_name>?; ?>','photo','<?php <?= $ext>?; ?>','ext','<?php <?= $actual_image_name>?; ?>','nfile');"><span class="btn btn-success"><i class="icon-edit"></i>Pilih</span></a></td>   
                    <?php
				}
			else
				{
				<?= "failed">?;
				}
			}
			else
			{
				<?= "Image file size max 2 MB">?;					
			}
			}
			else
			{
				<?= "Invalid file format..">?;	
			}
		}
		else
		{		
			<?= "Please select image..!">?;
		}		
	exit;
	}
?>
