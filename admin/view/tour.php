<link rel="stylesheet" type="text/css" href="../admin/css/ql.css">
<div class="content">
<table style="width:100%">
<tr>
    <th>STT</th>
    <th>Tên Tour</th> 
    <th>ngày khởi hành</th>
    <th>ngày kết thúc</th>
    <th>Giá</th>
    <th>Nơi xuất phát</th>
    <th>Nổi bật(hot 1)</th>
    <th>Vùng miền</th>
    <th>Xe</th>
    <th>Khách sạn</th>
    <th>Ảnh</th>
    <th>Số chỗ ngồi</th>
    <th>Số chỗ còn trống</th>
    <th>Sửa</th>
    <th>Xóa</th>
</tr>
<tr>
<?php
    $conn=mysqli_connect('localhost','root','','btlon');
    if(!$conn){
        die("khong the ket noi".mysqli_connect_error());
    }
    //thuc hien cau truy van
    mysqli_set_charset($conn,"utf8");
    $sql = "SELECT * from tour order by idTour";
    $result=mysqli_query($conn,$sql);
    $stt=0;
    while($row=mysqli_fetch_assoc($result)){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
    ?>
    <td>
        <?php
        echo'<h5>'.$row['nameTour'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['ngaykhoihanh'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['ngayketthuc'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['gia'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['diemxuatphat'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['noibat'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['vungmien'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['vanchuyen'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['khachsan'].'</h5>';
        ?>
    </td>
    <td><img src="./../public/images/<?php echo $row['images'];?>" style="width: 100px;height: 50px;">
    </td>
    <td>
        <?php
        echo'<h5>'.$row['sochongoi'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['socho'].'</h5>';
        ?>
    </td>
    <?php
    echo"
    <td>
        <a href='./../admin/view/update_tour.php?idTour=".$row['idTour']."'><span class = 'glyphicon glyphicon-pencil'></ span></a>
    </td>";
    echo"
    <td>
        <a href='./../admin/view/dele_tour.php?idTour=".$row['idTour']."'><span class = 'glyphicon glyphicon-trash'></ span></a>
    </td>";
    }
    ?>
</tr>
</table>
</div>
