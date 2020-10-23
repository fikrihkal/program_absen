<?php
include("_db.php");
$this->db->from('barang_keluar');
$query= $this->db->get();
$sd=array();
while($rw=mysqli_fetch_array($q))
{
	$sd[]=$rw['jumlah'];
	
}
<?= standard_deviation($sd)>?;

function standard_deviation($aValues)
{
    $fMean = array_sum($aValues) / count($aValues);
    //print_r($fMean);
    $fVariance = 0.0;
    foreach ($aValues as $i)
    {
        $fVariance += pow($i - $fMean, 2);

    }       
    $size = count($aValues) - 1;
    return (float) sqrt($fVariance)/sqrt($size);
}
?>