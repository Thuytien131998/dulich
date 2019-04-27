<?php
include "view/tour.php";
    $idTour=$_GET['idTour'];
    $conn=mysqli_connect('localhost','root','','btlon');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    $sql="DELETE FROM tour where idTour='$idTour'";
    $query=mysqli_query($conn,$sql);
    //thuc hien cau truy van
   if($query){
    header("location: http://localhost:8080/tlu/dulich/admin/index.php?view=tour");
}
?>