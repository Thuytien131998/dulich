<?php 
  $con = mysqli_connect("localhost","root","","btlon"); //mo ra kết nối đến máy chủ
  if (mysqli_connect_errno())
  {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();//không thể kết nối
  }
  //đặt bộ kí tự máy khách mặc định là 
  mysqli_query($con,"SET CHARACTER SET 'utf8'");
  mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DU LỊCH TRONG NƯỚC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./../public/css/menu1.css">
</head> 
<body>
  <div class="container-fluid">
      <div class="header">
          <div>
              <div class="row">
                  <div class="col-sm-1">
                  <a class="fa fa-home" href="http://localhost:8080/tlu/dulich/index.php" ></a></div>
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
                    <form class="navbar-form navbar-left" action="/action_page.php">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập nội dung cần tìm">
                        <div class="input-group-btn">
                          <button class="btn btn-default" type="submit">
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
                      $con = mysqli_connect("localhost","root","","btlon"); //mo ra kết nối đến máy chủ
                      if (mysqli_connect_errno())
                      {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();//không thể kết nối
                      }
                      //đặt bộ kí tự máy khách mặc định là 
                      mysqli_query($con,"SET CHARACTER SET 'utf8'");
                      mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
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
                    <a class="log-in" href="http://localhost:8080/tlu/dulich/view/login.php">Đăng nhập</a>
                  </div>  
              </div>
          </div>
        </div>  
  </div>
  <div class="content">
    <div class="gallery">
    <img src="./../public/images/tet.jpg" style="width:100%; height:600px">
    </div>
    <div class="container">
    <?php
      
      function getnhomtour()
      {
        global $con;
        $idvung=$_GET["idvung"];
        $result = mysqli_query($con,"SELECT * from tour where idvung=$idvung ");
        $arr=array();
        while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
          $arr[]=$rows;
        }	
        return $arr;
      }
      $getnhomtour=getnhomtour();
      if(isset($getnhomtour)) foreach($getnhomtour as $value)
      {
      ?>
    <div class="col-sm-4"   style="margin-top: 20px;">
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
  </div>
  </div>
   <div class="footer">
    <div class="container">
      <div class="col-sm-5">
        <a href="http://localhost:8080/tlu/dulich/index.php">DU LỊCH TRONG NƯỚC</a>
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