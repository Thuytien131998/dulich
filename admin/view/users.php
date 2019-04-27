<link rel="stylesheet" type="text/css" href="../admin/css/ql.css">
<div class="content">
<table style="width:100% ">
<tr>
    <th>STT</th>
    <th>username</th> 
    <th>password</th>
    <th>phone</th>
    <th>email</th>
    <th>address</th>
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
    $sql = "SELECT * from users order by id";
    $result=mysqli_query($conn,$sql);
    $stt=0;
    while($row=mysqli_fetch_assoc($result)){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
    ?>
    <td>
        <?php
        echo'<h5>'.$row['username'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['password'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['phone'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['email'].'</h5>';
        ?>
    </td>
    <td>
        <?php
        echo'<h5>'.$row['address'].'</h5>';
        ?>
    </td>
    <?php
    echo"
    <td>
        <a href='./../admin/view/dele_user.php?id=".$row['id']."'><span class = 'glyphicon glyphicon-trash'> </ span></a>
    </td>";
    }
    ?>
</tr>
</table>
</div>
