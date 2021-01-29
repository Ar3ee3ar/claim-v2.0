 <?php
	header('Content-Type: application/json');

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "sapro";
	$dbName = "eguarantee";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "INSERT INTO claim_order(CustomerID, CustomerName, CustomerTel, CustomerAddress, CustomerEmail, DatePick, ItemModel, ItemColor, outOrder, submit_date, send_date) VALUES 
	('".$_POST["validationCustomCusCode"]."','".$_POST["validationCustomEngName"]."','".$_POST["validationCustomTel"]."','".$_POST["validationCustomAdd"]."','".$_POST["validationCustomEmail"]."','".$_POST["validationCustomDate"]."','".$_POST["validationCustomModel"]."'
		,'".$_POST["validationCustomColor"]."','".$_POST["validationCustomoutOrder"]."', NOW(),NOW()+INTERVAL 1 DAY)";
	
	if($_POST['validationCustomCusCode']!='' && $_POST['validationCustomEngName']!='' && $_POST['validationCustomTel']!='' && $_POST['validationCustomAdd']!='' && $_POST['validationCustomEmail']!='' && $_POST['validationCustomDate']!=''
		 && $_POST['validationCustomModel']!='' && $_POST['validationCustomColor']!='' && $_POST['validationCustomoutOrder']!='')
		 {
			$query = mysqli_query($conn,$sql);
			if($query) {
				echo json_encode(array('status' => '1','message'=> 'We have got your request already!!'));
			}
			else
			{
				echo json_encode(array('status' => '0','message'=> 'Error insert data!')); //not working
			}
		 }
		 else
		 {
			echo json_encode(array('status' => '0','message'=> 'All field must be field out!')); //not working
		 }
	mysqli_close($conn);
?>