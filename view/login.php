<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DU LỊCH TRONG NƯỚC-login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./../public/css/login.css" >
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
                    <a class="dangki" href="http://localhost:8080/tlu/dulich/view/register.php">Đăng kí</a>
                  </div>
     </div>
  </div>
</div>
<div class="content">
  <form method="post">
    <h1>Đăng nhập</h1>
    <input class="t" placeholder="username" type="text" required=""  name="username" >
    <input  class="t" placeholder="password" type="password" required="" name="password">
    <button class="t" type="submit" name="submit" data-toggle="modal" data-target="#myModal">Đăng nhập</button>
</div>
<?php
  $conn=mysqli_connect('localhost','root','','btlon');
  if(!$conn){
      die("khong the ket noi".mysqli_connect_error());
  }
  $getcustomer="";
  if(isset($_POST["submit"])){
    $username= mysqli_real_escape_string($conn,$_POST["username"]);
    $password= mysqli_real_escape_string($conn,$_POST["password"]);
    $sql="select * from users where username='$username' and password='$password'";
    $query=mysqli_query($conn,$sql);
    $num_row=mysqli_num_rows($query);
    if($num_row !=0){
      $_SESSION["loged_customer"]=true;
      header("Location: http://localhost:8080/tlu/dulich/view/index1.php");
      $_SESSION["username_customer"]= $username;
      die();
    }
    else{
      echo'
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <p>Tên đăng nhập hoặc mật khẩu sai, vui lòng nhập lại!</p>
          </div>
        </div>  
      </div>';
    }

    mysqli_close($conn);
  }
?>
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