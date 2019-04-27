<meta charset="utf-8">
<?php
$act="";
if(isset($_GET["act"]))
{
	$act=$_GET["act"];
	echo $act;
	switch ($act)
	{
		case"logout":
		unset($_SESSION["loged_customer"]);
		break;	
	}
}
header("Location: http://localhost:8080/tlu/dulich/");
?>