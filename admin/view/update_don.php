<link rel="stylesheet" type="text/css" href="../css/update_tour.css">
<div class="content">
<?php
$conn=mysqli_connect('localhost','root','','btlon');
if(!$conn){
    die("khong the ket noi".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$idDH=$_GET['idDH'];
$sql = "SELECT * from donhang where idDH='$idDH'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if(isset($_POST["submit"])){
  $idDH=mysqli_real_escape_string($conn,$_POST["idDH"]);
  $name= mysqli_real_escape_string($conn,$_POST["name"]);
  $phoneDH= mysqli_real_escape_string($conn,$_POST["phoneDH"]);
  $emailDH= mysqli_real_escape_string($conn,$_POST["emailDH"]);
  $addressDH= mysqli_real_escape_string($conn,$_POST["addressDH"]);
  $Tenthenganhang= mysqli_real_escape_string($conn,$_POST["Tenthenganhang"]);
  $Masothe= mysqli_real_escape_string($conn,$_POST["Masothe"]);
  $NHH= mysqli_real_escape_string($conn,$_POST["NHH"]);
  $idTour= mysqli_real_escape_string($conn,$_POST["idTour"]);
  $soluong= mysqli_real_escape_string($conn,$_POST["soluong"]);
  $tongDH=mysqli_real_escape_string($conn,$_POST["tongDH"]);
  $tinhtrang= mysqli_real_escape_string($conn,$_POST["tinhtrang"]);
  $sql="UPDATE  donhang set  name='$name',phoneDH='$phoneDH',emailDH='$emailDH',addressDH='$addressDH',Tenthenganhang='$Tenthenganhang',Masothe='$Masothe',NHH='$NHH',idTour='$idTour',soluong='$soluong',tongDH='$tongDH',tinhtrang='$tinhtrang' where idDH='$idDH'";
  header("Location: http://localhost:8080/tlu/dulich/admin/index.php?view=don");
  $query=mysqli_query($conn,$sql);
  mysqli_close($conn);
}
?>
<form  method="POST">
  <div class="form-group">
  <input type="hidden" class="form-control" name="idDH" value="<?php echo $idDH; ?>">
    <label for="name" class="col-sm-1">Tên Khách: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="name" class="form-control" name="name"value="<?php echo $row['name']; ?>"></div>

    <label for="name" class="col-sm-1">Phone: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="phoneDH" class="form-control" name="phoneDH"value="<?php echo $row['phoneDH']; ?>"></div>

    <label for="name" class="col-sm-1">Email: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="emailDH" class="form-control" name="emailDH"value="<?php echo $row['emailDH']; ?>"></div>

    <label for="name" class="col-sm-1">Địa chỉ: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="addressDH" class="form-control"name="addressDH" value="<?php echo $row['addressDH']; ?>" ></div>

    <label for="name" class="col-sm-1">Chủ thẻ ngân hàng: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="Tenthenganhang" class="form-control" name="Tenthenganhang" value="<?php echo $row['Tenthenganhang']; ?>"></div>

    <label for="name" class="col-sm-1">Mã số thẻ: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="Masothe" class="form-control" name="Masothe" value="<?php echo $row['Masothe']; ?>"></div>

    <label for="name" class="col-sm-1">Năm hết hạn: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="NHH" class="form-control" name="NHH" value="<?php echo $row['NHH']; ?>"></div>

    <label for="name" class="col-sm-1">Năm hết hạn: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="idTour" class="form-control" name="idTour" value="<?php echo $row['idTour']; ?>"></div>

    <label for="name" class="col-sm-1">Số lượng: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="soluong" class="form-control" name="soluong" value="<?php echo $row['soluong']; ?>"></div>

    <label for="name" class="col-sm-1">Tổng tiền: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="tongDH" class="form-control" name="tongDH" value="<?php echo $row['tongDH']; ?>"></div>

    <label for="name" class="col-sm-1">Tình trạng: </label>
    <div class="col-sm-8" style=" margin-right:300px; margin-bottom:20px"> <input type="tinhtrang" class="form-control" name="tinhtrang" value="<?php echo $row['tinhtrang']; ?>"></div>

  </div>
  <br>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <input type="submit"  class="btn btn-primary" name="submit" value="Cập Nhập" >
      <a class="btn btn-warning" href="http://localhost:8080/tlu/dulich/admin/index.php?view=don" style="background-color: blue;">Trở về</a>
    </div>
  </div>
</form>
</div>