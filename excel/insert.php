<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	
if(!isset($_POST["submit"]))
{
	?>
	<form enctype="multipart/form-data" method="post" action="insert.php">
	<input type="file" name="upload" id="pdf_browser"/>
	<input type="submit" name="submit" value="Enter in to the database"/>
	</form>
<?php	
}
else{
	require_once '/Classes/PHPExcel/IOFactory.php';

$inputFileType = 'Excel5';
$inputFileName =$_FILES['upload']['tmp_name'];
$info=pathinfo($_FILES['upload']['name']);
$name=$info['filename'];
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcelReader = $objReader->load($inputFileName);

$loadedSheetNames = $objPHPExcelReader->getSheetNames();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'CSV');

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $objWriter->setSheetIndex($sheetIndex);
    $objWriter->save("temp.csv");
}
}	
if(!($connect=new mysqli('localhost','Examcell','automation','mini-project'))){
	echo "Connection failed";
}
	$count=0;
	$flag=0;
if($handle=fopen("temp.csv","r"))
{
	while($data=fgetcsv($handle,1000,",")){
		$count++;
		if($count>2){
			$qw=$connect->query("INSERT INTO calculas(reg_no) VALUES ('$data[1]')");
		if($qw){}
			else{$flag=1;}
			
		}
	}
	if($flag==0)
	{
		
	}
	
}

fclose($handle);
mysqli_close($connect);
?>
</body>
</html>