<?php
include "view/users.php";
    $id=$_GET['id'];
    $conn=mysqli_connect('localhost','root','','btlon');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    $sql="DELETE FROM users where id='$id'";
    $query=mysqli_query($conn,$sql);
    //thuc hien cau truy van
   if($query){
    header("location: http://localhost:8080/tlu/dulich/admin/");
}
?>