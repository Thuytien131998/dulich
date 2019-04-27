<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DU LỊCH TRONG NƯỚC-registration</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./../public/css/registers.css">
</head>
<body>
<div class="container-fluid">
  <div class="hearder">
     <div>
     <div class="row">
      <div class="col-sm-1">
      <a class="fa fa-home" href="http://localhost:8080/tlu/dulich/index.php"></a>
      </div>
      <div class="col-sm-1">
      <p><a href="mailto:Tien.vitconxauxi@gmail.com">
        Email
       </a></p>
      </div>
      <div class="col-sm-2">
      <a class="ticket-hotline"  href="tel:1900 1800">
      Hotline: 1900 1800</a>
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
      <div class="col-sm-0">
        <a class="log-in" href="http://localhost:8080/tlu/dulich/view/login.php">Đăng nhập</a>
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
mysqli_set_charset($conn,"utf8");
if(isset($_POST["submit"])){
  $username= mysqli_real_escape_string($conn,$_POST["username"]);
  $password= mysqli_real_escape_string($conn,$_POST["password"]);
  $phone= mysqli_real_escape_string($conn,$_POST["phone"]);
  $email= mysqli_real_escape_string($conn,$_POST["email"]);
  $address= mysqli_real_escape_string($conn,$_POST["address"]);
  $sql="insert into users(username,password,phone,email,address,pk)value('$username','$password','$phone','$email','$address','0')";
  header("Location: http://localhost:8080/tlu/dulich/view/index1.php");
  $query=mysqli_query($conn,$sql);
  mysqli_close($conn);
}
?>
 <div class="dangki">
    <form method="post" >
      <h1>Đăng kí</h1>
        <input class="t" placeholder="username" type="text" required=""  name="username" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]){3,15})"title="Vui lòng nhập lại tên!">
        <input  class="t" placeholder="password" type="password" required="" name="password" >
        <input class="t" placeholder="phone" type="text" required=""  name="phone" pattern="([0-9]{10})"title="Vui lòng nhập đúng số điện thoại!" >
        <input class="t" placeholder="email" type="text" required=""  name="email" pattern="([\w._%+-]+@[\w.-]+[a-zA-Z]{2,4})"title="Vui lòng nhập lại email!" >
        <input class="t" placeholder="address" type="text" required=""  name="address" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]){3,})"title="Vui lòng nhập lại địa chỉ!">
        <button class="t" type="submit" name="submit"  >Đăng kí</button>
        <button class="ta" type="reset" name="submit">Viết lại</button>
    </form>
  </div>
</div>
<div class="footer">
    <div class="container">
      <div class="col-sm-5">
        <a href="http://localhost:8080/tlu/dulich/index.php">DU LỊCH TRONG NƯỚC</a>
        <ul>
          <p>Email:Tien.vitconxaixi@gmail.com</p>
          <p>Tư vấn: 1900 1800</p>
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
