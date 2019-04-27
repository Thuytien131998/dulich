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
  <link rel="stylesheet" type="text/css" href="../../public/css/dat.css" >
</head>
<body>
<?php
$conn=mysqli_connect('localhost','root','','dulich');
if(!$conn){
    die("khong the ket noi".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
if(isset($_POST["submit"])){
  $name= mysqli_real_escape_string($conn,$_POST["name"]);
  $Tenthenganhang= mysqli_real_escape_string($conn,$_POST["Tenthenganhang"]);
  $phoneDH= mysqli_real_escape_string($conn,$_POST["phoneDH"]);
  $emailDH= mysqli_real_escape_string($conn,$_POST["emailDH"]);
  $addressDH= mysqli_real_escape_string($conn,$_POST["addressDH"]);
  $Masothe= mysqli_real_escape_string($conn,$_POST["Masothe"]);
  $NHH= mysqli_real_escape_string($conn,$_POST["NHH"]);
  $idTour= $_GET["id"];
  $soluong= mysqli_real_escape_string($conn,$_POST["soluong"]);
  echo $soluong;
  $tongDH= mysqli_real_escape_string($conn,$_POST["tongDH"]);
  $sql="INSERT INTO donhang VALUES ('3','$name',' $phoneDH','$emailDH','$addressDH','$Tenthenganhang','$Masothe','$NHH','$idTour','$soluong','$tongDH','chưa nhận')";
  $query=mysqli_query($conn,$sql);
  header("Location: http://localhost:8080/dulich/index.php");
}
?>
<div class="container-fluid">
<div class="header">
          <div>
              <div class="row">
              <div class="col-sm-1">
                  <a class="fa fa-home" href="http://localhost:8080/dulich/index.php" ></a></div>  
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
                      $con = mysqli_connect("localhost","root","","dulich"); //mo ra kết nối đến máy chủ
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
                      <a href="http://localhost:8080/dulich/view/menu.php?idvung=<?php echo $value["idvung"] ?>"><?php echo $value["vungmien"]?></a>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <a class="log-in" href="http://localhost:8080/dulich/view/login.php">Đăng nhập</a>
                  </div>  
              </div>
          </div>
        </div>  
</div>
<div class="content">

  <div class="don">
  <form action="" method="post">
    <div class="col-50">
      <h3>Thông Tin</h3>
      <label for="fname"><i class="fa fa-user"></i> Họ và tên</label>
      <input type="text" id="fname" name="name" placeholder="Full name" required="">
      <label for="fname"><i class="fa fa-user"></i> Số điện thoại</label>
      <input type="text" id="phone" name="phoneDH" placeholder="phone" required="" pattern="([0-9]{10})"title="Vui lòng nhập đúng số điện thoại!">
      <label for="email"><i class="fa fa-envelope"></i> Email</label>
      <input type="text" id="email" name="emailDH" placeholder="john@example.com" required="" pattern="([\w._%+-]+@[\w.-]+[a-zA-Z]{2,4})"title="Vui lòng nhập lại email!">
      <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
      <input type="text" id="adr" name="addressDH" placeholder="address" required="">
    </div>
    <div class="col-50">
      <h3> Cách thanh toán</h3>
      <label for="fname"><i class="fa fa-user"></i>Chủ thẻ</label>
      <input type="text" id="NameCard" name="Tenthenganhang" placeholder="Name on Card" required="">
      <label for="fname"><i class="fa fa-user"></i>Số thẻ tín dụng</label>
      <input type="text" id="Creditnumber" name="Masothe" placeholder="Credit card number" required="" pattern="(\d{4}\d{4}\d{4}\d{4})" title="Vui lòng nhập lại số thẻ!">
      <label for="fname"><i class="fa fa-user"></i>Năm hết hạn thẻ</label>
      <input type="text" id="ExpYear" name="NHH" placeholder="Exp Year" required="" pattern="(\d{4})" title="Vui lòng nhập lại năm hết hạn thẻ!">
      <label>
        <input type="checkbox" checked="checked" name="sameadr"> Địa chỉ giao hàng giống với thanh toán!
      </label>
      <input type="submit" value="XÁC NHẬN" class="btn"  name="submit">
    </div>
    <div class="don">
  <div class="col-25">
      <h4>Thanh toán</h4>
      <hr>
      <h5><div class="col-sm-3">
      <p><b>Tên Tour</b></p>
      </div>
      <div class="col-sm-3">
      <p><b>Giá</b></p>
      </div>
      <div class="col-sm-3">
      <p><b>Số lượng</b></p>
      </div>
      <div class="col-sm-3">
      <p><b>Tổng cộng</b></p>
      </div>
      </h5>
      <hr>
      <hr>
  </div>
  <div class="chitiet">
  <?php
    $conn=mysqli_connect('localhost','root','','dulich');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    //thuc hien cau truy van
    mysqli_set_charset($conn,"utf8");
    $id=$_GET["id"];
    $sql = "SELECT * from tour where idTour=$id";
    $result=mysqli_query($conn,$sql);
    //xu li ket qua truy van
    ?>
      <div class="dondat">
      <?php
    while($row=mysqli_fetch_assoc($result)){
    ?>
      <input type="hidden" class="form-control" name="idTour" value="<?php echo $row['$id']; ?>" text="<?php echo $row['$id']; ?>">
      <div class="col-sm-3">
      <?php
        echo'<p id=name name=nameTour>'.$row['nameTour'].'</p>';?></div>
      <div class="col-sm-3">
      <?php
        echo'<p id=gia>'.$row['gia'].'</p>';?></div>
      <div class="col-sm-3" style="width:10%">
      <input type="text" id="soluong" name="soluong" required=""></div>
      <?php
      
      ?>
        <div class="col-sm-3">
      <input type="text" id=tongtien name="tongDH">
      <?php
      mysqli_close($conn);
      }
      ?></div>
      </div>
      <hr>
      </div>
  </form>
  </div>
 
</div>
<div class="footer">
    <div class="container">
      <div class="col-sm-5">
        <a href="http://localhost:8080/dulich/index.php">DU LỊCH TRONG NƯỚC</a>
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
<script type="text/javascript">
 $( document ).ready(function() {
    $("#soluong").val("1");
    var tongtien = 0;
    var gia = $("#gia").text(); 
    var soluong = $("#soluong").val();
    tongtien = parseInt(gia)*parseInt(soluong);
    $("#tongtien").val(tongtien);
  });

  $( "#soluong" ).keyup(function() {
    var tongtien = 0;
    var gia = $("#gia").text(); 
    var soluong = $("#soluong").val();
    tongtien = parseInt(gia)*parseInt(soluong);
    $("#tongtien").val(tongtien);
  });
</script>
</html>
