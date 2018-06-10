<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once '/Classes/PHPExcel/IOFactory.php';
	require_once('database.php');
$sem=$_GET['s'];
	echo $sem;
$dept=$_GET['dept'];
	echo $dept;
if($res=$db->query("SELECT subid FROM SUBJECT WHERE sem=$sem AND dept=$dept"))
{
	while($id=$res->fetch_assoc())
	{
	if(!(empty($_FILES[$id['subid']]['tmp_name'])))
{
$inputFileType = 'Excel5';
$inputFileName =$_FILES[$id['subid']]['tmp_name'];
$info=pathinfo($_FILES[$id['subid']]['name']);
$name=$info['filename'];
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcelReader = $objReader->load($inputFileName);

$loadedSheetNames = $objPHPExcelReader->getSheetNames();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'CSV');

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $objWriter->setSheetIndex($sheetIndex);
    $objWriter->save("temp.csv");
}
	$n=$id['subid'];
    $u=$db->query("SELECT sem,slot,drawhall,dept FROM SUBJECT WHERE subid='$n'");
	$out=$u->fetch_assoc();
	$nam=$out['sem'].$out['slot'];
	$dh=$out['drawhall'];
	$dp=$out['dept'];
	$count=0;
	$flag=0;
if($handle=fopen("temp.csv","r"))
{
	while($data=fgetcsv($handle,1000,",")){
		$count++;
		if($count>2){
			$qw=$db->query("INSERT INTO $nam(`SID`,`DEPT`,`SUB`,`DHALL`) VALUES ('$data[1]','$dp','$n',$dh)");
		}
		
			
		}
	}
	



fclose($handle);
}
	}
}
	else{ echo "connection failed";}
header('location:../upload.php?s='.$sem.'');
?>
</body>
</html>