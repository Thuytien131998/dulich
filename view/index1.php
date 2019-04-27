<?php 
  include "../config.php"; //chèn nd của tệp này vào tệp khác trc khi máy chủ thực thi nó
	session_start(); //phiên bắt đầu
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DU LỊCH TRONG NƯỚC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./public/js/bootstrap.min.css">
  <script src="./public/js/jquery-3.3.1.min.js"></script>
  <script src="./public/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./../public/css/btlon1.css">
</head> 
<body>
  <div class="container-fluid">
      <div class="header">
          <div>
              <div class="row">
                  <div class="col-sm-1">
                  <a class="fa fa-home" href="http://localhost:8080/tlu/dulich/view/index1.php" ></a></div>
                  <div class="col-sm-1">
                    <p><a href="mailto:Tien.vitconxauxi@gmail.com">
                        Email
                        </a>
                    </p>
                  </div>
                  <div class="col-sm-2">
                    <a class="ticket-hotline"
                    href="tel:1900 1800">
                     Hotline: 1900 1800
                    </a>
                  </div>
                  <div class="col-sm-3">
                    <form class="navbar-form navbar-left" action="">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập nội dung cần tìm" name="search">
                        <div class="input-group-btn">
                          <button class="btn btn-default" type="submit" name="btn_search">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                  <div class="col-sm-3 dropdown">
                    <button class="TOUR" href="#">TOUR TRONG NƯỚC</button>
                    <div class="dropdown-content">
                    <?php
                     function getmenu(){
                      global $con;
                      mysqli_set_charset($con,"utf8");
                      $result = mysqli_query($con,"select DISTINCT vungmien,idvung from tour");
                      $arr=array();
                      while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
                      {
                        $arr[]=$rows;	
                      }	
                      return $arr;
                     }
                     $getmenu=getmenu();
                     if(isset($getmenu))foreach($getmenu as $value){
                    ?>
                      <a href="http://localhost:8080/tlu/dulich/view/menu.php?idvung=<?php echo $value["idvung"] ?>"><?php echo $value["vungmien"]?></a>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-sm-1">
                  <?php 
				          if(!isset($_SESSION["loged_customer"])) 
				             {
				          ?>
                  <ul class="l">
                  <li>
                    <a href=""><span  class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION["loged_customer"])) echo $customer;?></a>
                  </li>
                  <li>
                  <a href="http://localhost:8080/tlu/dulich/view/logout.php" class="logout" title="Đăng xuất" type="dangxuat" name="dangxuat"><span  class="fa fa-sign-out"></span></a>
                  </li></ul>
				          <?php
				            }
				            else 
				            {
				          ?>
                  <a href="http://localhost:8080/tlu/dulich/view/login.php">Đăng nhập</a>
                  <?php	
			       	      }
				          ?> 
                </div>
              </div>
          </div>
        </div>  
  </div><?php
  if(isset($_SESSION["loged_customer"]))
	{
	$customer = $_SESSION["username_customer"];
	}
	else
	{
	$customer= "Đăng nhập";	
	}
	$act="";
	if(isset($_GET["act"]))
	{
		$act=$_GET["act"];
		switch ($act)
		{
			case"logout":
			unset($_SESSION["loged_customer"]);
			header("location:index.php");
			break;	
		}
	}?>
  <div class="content">
    <div class="bangtruyen">
      <div>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="./../public/images/a8.jpg">
                </div>
            
                <div class="item">
                  <img src="./../public/images/a7.jpg" >
                </div>
            
                <div class="item">
                  <img src="./../public/images/a5.jpg" >
                </div>
              </div>
            
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
      </div>
    </div>
    <div class="container">
    <div class="col-sm-12">
         <h3>ĐIỂM ĐẾN ĐANG HOT</h3>
    </div>
    <?php
	function getnhomtourhot()
	{
		global $con;
		$result = mysqli_query($con,"select * from tour where noibat='1' limit 3");
		$arr=array();
		while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$arr[]=$rows;	
		}	
		return $arr;
  }
  $getnhomtourhot=getnhomtourhot();
  if(isset($getnhomtourhot))foreach($getnhomtourhot as $value)
  {
    ?>
    <div class="col-sm-4">
      <div class="hot1">
        <img src="./../public/images/<?php echo $value["images"]?>" class="img1">
        <h4 class="text1"><?php echo $value["nameTour"]?></h4><span> Giá: <?php echo $value["gia"]?> vnd</span>
        <p><?php echo $value["khachsan"]?></p>
        <p>Khởi hành: <?php echo $value["diemxuatphat"]?></p>
        <a href="http://localhost:8080/tlu/dulich/view/ta.php/?id=<?php echo $value["idTour"] ?>" class="more">Xem chi tiết>></a> 
      </div>
    </div>
  <?php
  }
  ?>
  <div class="col-sm-12">
      <h3>DU LỊCH MIỀN BẮC</h3>
   </div>
   <?php
	function getnhomtourbac()
	{
		global $con;
		$result = mysqli_query($con,"select * from tour where vungmien='Miền Bắc'limit 3");
		$arr=array();
		while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$arr[]=$rows;	
		}	
		return $arr;
  }
  $getnhomtourbac=getnhomtourbac();
  if(isset($getnhomtourbac)) foreach($getnhomtourbac as $value)
  {
  ?>
   <div class="col-sm-4">
      <div class="hot1">
        <img src="./../public/images/<?php echo $value["images"]?>" class="img1">
        <h4 class="text1"><?php echo $value["nameTour"]?></h4><span> Giá: <?php echo $value["gia"]?> vnd</span>
        <p><?php echo $value["khachsan"]?></p>
        <p>Khởi hành:<?php echo $value["diemxuatphat"]?></p>
        <a href="http://localhost:8080/tlu/dulich/view/ta.php/?id=<?php echo $value["idTour"] ?>" class="more">Xem chi tiết>></a> 
      </div>
  </div>
  <?php
  }
  ?>
  <div class="col-sm-12">
      <h3>DU LỊCH MIỀN TRUNG</h3>
 </div>
 <?php
	function getnhomtourtrung()
	{
		global $con;
		$result = mysqli_query($con,"select * from tour where vungmien='Miền Trung' limit 3");
		$arr=array();
		while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$arr[]=$rows;	
		}	
		return $arr;
  }
  $getnhomtourtrung=getnhomtourtrung();
  if(isset($getnhomtourtrung))foreach($getnhomtourtrung as $value)
  {
  ?>
  <div class="col-sm-4">
      <div class="hot1">
        <img src="./../public/images/<?php echo $value["images"]?>" class="img1">
        <h4 class="text1"><?php echo $value["nameTour"]?></h4><span> Giá: <?php echo $value["gia"]?> vnd</span>
        <p><?php echo $value["khachsan"]?></p>
        <p>Khởi hành:<?php echo $value["diemxuatphat"]?></p>
        <a href="http://localhost:8080/tlu/dulich/view/ta.php/?id=<?php echo $value["idTour"] ?>" class="more">Xem chi tiết>></a> 
      </div>
  </div>
  <?php
  }
  ?>
  <div class="col-sm-12">
      <h3>DU LỊCH MIỀN NAM</h3>
 </div>
 <?php
	function getnhomtournam()
	{
		global $con;
		$result = mysqli_query($con,"select * from tour where vungmien='Miền Nam' limit 3");
		$arr=array();
		while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$arr[]=$rows;	
		}	
		return $arr;
  }
  
  $getnhomtournam=getnhomtournam();
  if(isset($getnhomtournam))
  foreach($getnhomtournam as $value)
  {
  ?>
  <div class="col-sm-4">
      <div class="hot1">
        <img src="./../public/images/<?php echo $value["images"] ?>" class="img1">
        <h4 class="text1"><?php echo $value["nameTour"]; ?></h4><span> Giá: <?php echo $value["gia"]?> vnd</span>
        <p><?php echo $value["khachsan"]?></p>
        <p>Khởi hành: <?php echo $value["diemxuatphat"]?></p>
        <a href="http://localhost:8080/tlu/dulich/view/ta.php/?id=<?php echo $value["idTour"] ?>" class="more">Xem chi tiết>></a> 
      </div>
  </div>
  <?php
}
?>

</div>
  </div>
  <div class="footer">
    <div class="container">
      <div class="col-sm-5">
        <a href="http://localhost:8080/tlu/dulich/view/index1.php">DU LỊCH TRONG NƯỚC</a>
        <ul>
          <p>Email:Tien.vitconxaixi@gmail.com</p>
          <p>Tư vấn: 1900 1800</p>
         <img src="./../public/images/i.png" class="a1">
        </ul>
      </div>
      <div class="col-sm-5">
        <a>QUY ĐỊNH DÀNH CHO WEBSITE TMĐT BÁN HÀNG – DỊCH VỤ ĐẶT PHÒNG</a>
        <ul>
          <li><a href="#">Chính sách quy định chung</a></li>
          <li><a href="#">quy định về thanh toán</a></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>