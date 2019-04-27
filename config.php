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
