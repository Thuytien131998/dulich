<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>QUẢN LÍ DU LỊCH TRONG NƯỚC</title>
</head>
<body>
<div class="container-fluid">
<div class="header">
    <div class="row">
        <ul class="nav navbar-nav navbar-right">
            <li class=""><a>Xin chào <?php echo $_SESSION["username"]; ?></a></li>
            <li><a href="index.php?act=logout">Đăng xuất</a></li>
        </ul>
     <br>
     <br>
    <div class="container">
        <div class="col-sm-3 ">
        <button class="TOUR" ><a href="index.php?view=users">QUẢN LÍ KHÁCH HÀNG</a></button>
        </div>
        <div class="col-sm-2 dropdown">
        <button class="TOUR" href="#">TOUR</button>
        <div class="dropdown-content">
            <a href="index.php?view=add_tour">Thêm Tour</a>
            <a href="index.php?view=tour">Danh sách Tour</a>
        </div>
        </div>
        <div class="col-sm-2 dropdown">
        <button class="TOUR" href="#">ĐƠN HÀNG</button>
        <div class="dropdown-content">
            <a href="index.php?view=don">Danh sách đơn hàng chưa đi</a>
            <a href="index.php?view=dondi">Đơn đã đi</a>
        </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include $view;?>
</body>
</html>