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
  <link rel="stylesheet" type="text/css" href="../../public/css/ta1.css">
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
    <?php
    $conn=mysqli_connect('localhost','root','','btlon');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    $id=$_GET["id"];
    //thuc hien cau truy van
    mysqli_set_charset($conn,"utf8");
    $sql = "SELECT * from tour where idTour=$id";
    $result=mysqli_query($conn,$sql);
    //xu li ket qua truy van
    ?>
    <div class="container">
    <?php
    while($row=mysqli_fetch_assoc($result)){
    ?><div class="col-sm-12"><?php
        echo'<h2>'.$row['nameTour'].'</h2>';?></div>
         <div class="col-sm-6"><?php
        echo'<h5><p class="b">Ngày khởi hành:</p>'.$row['ngaykhoihanh'].'</h5>';?></div>
        <div class="col-sm-6"><?php
        echo'<h5><p class="b">Ngày kết thúc :</p>'.$row['ngayketthuc'].'</h5>';?></div>
        <div class="col-sm-6"><?php
        echo'<h5><p class="b">Địa điểm xuất phát:</p>'.$row['diemxuatphat'].'</h5>';?></div>
        <div class="col-sm-6"><?php
        echo'<h5><p class="b">Xe vận chuyển :</p>'.$row['vanchuyen'].'</h5>';?></div>
        <div class="col-sm-6"><?php
        echo'<h5>'.$row['khachsan'].'</h5>';?></div>
        <div class="col-sm-6"><?php
        echo'<h5><p class="b">Số chỗ ngồi :</p>'.$row['sochongoi'].'</h5>';?></div>
        <div class="col-sm-12">
        <div style="background-color:pink;color: black; margin: 10px 0 10px;">
        <div class="col-sm-6">
        <?php
        echo '<h3><p class="b">GIÁ:</p>'.$row['gia'].' vnd</h3>'
        ?>
        </div>
        <div class="col-sm-6">
        <?php
        echo '<h3><p class="b">Số chỗ còn:</p>'.$row['socho'].'</h3>'
        ?>
        </div>
        <a href="http://localhost:8080/tlu/dulich/view/dat.php/?id=<?php echo $row["idTour"] ?>">
       <button class="btn btn-primary btn-block" >Đặt Tour</button></a>
       </div>
        <?php 
        echo'<img src="../../public/images/'.$row['images'].'"width="1100" height="600px" />';
        echo '<p><h4>Lịch trình:</h4>'.$row['lichtrinh'].'</p>';
        echo '<p><h4>Ghi chú:</h4>'.$row['ghichu'].'</p>';
    }
    mysqli_close($conn);
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
         <img src="../../public/images/i.png" class="a1">
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