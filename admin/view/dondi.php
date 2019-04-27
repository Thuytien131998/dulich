<link rel="stylesheet" type="text/css" href="../admin/css/ql.css">
<div class="content">
<table style="width:100%">
<tr>
    <th>STT</th>
    <th>Tên Khách</th> 
    <th>SDT</th>
    <th>Email</th>
    <th>Địa chỉ</th>
    <th>Tên thẻ ngân hàng</th>
    <th>Mã số thẻ</th>
    <th>Năm hết hạn</th>
    <th>Tên tour</th>
    <th>Số lượng</th>
    <th>Tổng tiền</th>
    <th>Tình trạng</th>
</tr>
<tr>
<?php
    $conn=mysqli_connect('localhost','root','','btlon');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    //thuc hien cau truy van
    mysqli_set_charset($conn,"utf8");
    $sql = "SELECT * from donhang  where tinhtrang='đã nhận'";
    $result=mysqli_query($conn,$sql);
    $stt=0;
    while($row=mysqli_fetch_assoc($result)){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
    ?>
    <td>
        <?php
        echo'<h5>'.$row['name'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['phoneDH'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['emailDH'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['addressDH'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['Tenthenganhang'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['Masothe'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['NHH'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['idTour'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['soluong'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['tongDH'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['tinhtrang'].'</h5>';
        ?>
    </td>
    <?php
    }
    ?>
</tr>
</table>
</div>