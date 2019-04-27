<link rel="stylesheet" type="text/css" href="../css/update_tour.css">
<div class="content">
<?php
$conn=mysqli_connect('localhost','root','','btlon');
if(!$conn){
    die("khong the ket noi".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$idTour=$_GET['idTour'];
$sql = "SELECT * from tour where idTour='$idTour'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if(isset($_POST["submit"])){
  $idTour=mysqli_real_escape_string($conn,$_POST["idTour"]);
  $nameTour= mysqli_real_escape_string($conn,$_POST["nameTour"]);
  $ngaykhoihanh= mysqli_real_escape_string($conn,$_POST["ngaykhoihanh"]);
  $ngayketthuc= mysqli_real_escape_string($conn,$_POST["ngayketthuc"]);
  $gia= mysqli_real_escape_string($conn,$_POST["gia"]);
  $diemxuatphat= mysqli_real_escape_string($conn,$_POST["diemxuatphat"]);
  $noibat= mysqli_real_escape_string($conn,$_POST["noibat"]);
  $vungmien= mysqli_real_escape_string($conn,$_POST["vungmien"]);
  $vanchuyen= mysqli_real_escape_string($conn,$_POST["vanchuyen"]);
  $khachsan= mysqli_real_escape_string($conn,$_POST["khachsan"]);
  $images=mysqli_real_escape_string($conn,$_POST["images"]);
  $sochongoi= mysqli_real_escape_string($conn,$_POST["sochongoi"]);
  $lichtrinh= mysqli_real_escape_string($conn,$_POST["lichtrinh"]);
  $ghichu= mysqli_real_escape_string($conn,$_POST["ghichu"]);
  $socho= mysqli_real_escape_string($conn,$_POST["socho"]);
  $idvung= mysqli_real_escape_string($conn,$_POST["idvung"]);
  $sql="UPDATE  tour set nameTour='$nameTour',ngaykhoihanh='$ngaykhoihanh',ngayketthuc='$ngayketthuc',gia='$gia',diemxuatphat='$diemxuatphat',noibat='$noibat',vungmien='$vungmien',vanchuyen='$vanchuyen',khachsan='$khachsan',images='$images',sochongoi='$sochongoi',lichtrinh='$lichtrinh',ghichu='$ghichu',socho='$socho',idvung='$idvung' where idTour='$idTour'";
  header("Location: http://localhost:8080/tlu/dulich/admin/index.php?view=tour");
  $query=mysqli_query($conn,$sql);
  mysqli_close($conn);
}
?>
<form  method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" name="idTour" value="<?php echo $idTour; ?>">
    <label for="name" class="col-sm-1">Tiêu đề: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="nameTour" class="form-control" name="nameTour"value="<?php echo $row['nameTour']; ?>"></div>

    <label for="name" class="col-sm-1">Ngày khởi hành: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="ngaykhoihanh" class="form-control" name="ngaykhoihanh"value="<?php echo $row['ngaykhoihanh']; ?>"></div>

    <label for="name" class="col-sm-1">Ngày kết thúc: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="ngayketthuc" class="form-control" name="ngayketthuc"value="<?php echo $row['ngayketthuc']; ?>"></div>

    <label for="name" class="col-sm-1">Giá: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="gia" class="form-control"name="gia" value="<?php echo $row['gia']; ?>" ></div>

    <label for="name" class="col-sm-1">Điểm xuất phá: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="diemxuatphat" class="form-control" name="diemxuatphat" value="<?php echo $row['diemxuatphat']; ?>"></div>

    <label for="name" class="col-sm-1">Nổi bật(hot 1): </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="noibat" class="form-control" name="noibat" value="<?php echo $row['noibat']; ?>"></div>

    <label for="name" class="col-sm-1">Vùng miền: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="vungmien" class="form-control" name="vungmien" value="<?php echo $row['vungmien']; ?>"></div>

    <label for="name" class="col-sm-1">Xe: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="vanchuyen" class="form-control" name="vanchuyen" value="<?php echo $row['vanchuyen']; ?>"></div>

    <label for="name" class="col-sm-1">Khách sạn: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="khachsan" class="form-control" name="khachsan" value="<?php echo $row['khachsan']; ?>"></div>

    <label for="name" class="col-sm-1">Số chỗ ngồi: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="sochongoi" class="form-control" name="sochongoi" value="<?php echo $row['sochongoi']; ?>"></div>

    <label for="name" class="col-sm-1">Lịch trình: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="lichtrinh" class="form-control" name="lichtrinh" value="<?php echo $row['lichtrinh']; ?>"></div>

    <label for="name" class="col-sm-1">Ghi Chú: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="ghichu" class="form-control" name="ghichu" value="<?php echo $row['ghichu']; ?>"></div>

    <label for="name" class="col-sm-1">Số chỗ còn trống: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="socho" class="form-control" name="socho" value="<?php echo $row['socho']; ?>"></div>

    <label for="name" class="col-sm-1">ID vùng(bắc-1; trung-2;nam-3): </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:100px"> <input type="idvung" class="form-control" name="idvung" value="<?php echo $row['idvung']; ?>"></div>

    <label for="name" class="col-sm-1">Ảnh : </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:100px"> <input type="images" class="form-control" name="images" value="<?php echo $row['images']; ?>"></div>

  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <input type="submit"  class="btn btn-primary" name="submit" value="Cập Nhập" >
      <a class="btn btn-warning" href="http://localhost:8080/tlu/dulich/admin/index.php?view=tour" style="background-color: blue;">Trở về</a>
    </div>
  </div>
</form>
</div>