<meta charset="utf-8">
<?php 
	session_start();
	$act="";
	if(isset($_GET["act"]))
	{
		$act=$_GET["act"];
		switch ($act)
		{
			case "logout":
			unset($_SESSION["loged"]);
			break;		
		}
	}
	$c="";
	$view="view/users.php";
	if(isset($_GET["view"]))
	{
		$c=$_GET["view"];
		switch ($c)
		{
			case "users":
			$view="view/users.php";
			break;

			case "add_tour":
			$view="view/add_tour.php";
			break; 

			case "tour":
			$view="view/tour.php";
			break;

			case "don":
			$view="view/don.php";
			break;

			case "dondi":
			$view="view/dondi.php";
			break;
		}	
	}
	

  include "../config.php"; //chèn nd của tệp này vào tệp khác trc khi máy chủ thực thi nó
  if(!isset($_SESSION["loged"]))
	{
		header("location:login.php");
	}
  include "view/ql.php";
?>
