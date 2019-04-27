<?php 
  include "../config.php"; //chèn nd của tệp này vào tệp khác trc khi máy chủ thực thi nó
	session_start(); //phiên bắt đầu
?>
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
  <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
 <div class="container">
	<div class="panel panel-primary">
    	<div class="panel-heading" >LOGIN</div>
        <div class="panel-body">
        	<table class="table-condensed" >
            <form method="post" class="form-control">
            	<tr>
                	<td>
                    	<label for="username" >Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" style="width:300px;"  required >
                    </td>
                </tr>
                <tr>
                	<td>
                    	<label for="password" >Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" style="width:300px;"  required>
                    </td>
                </tr>
                <tr>
                	<td>
                    	<input type="submit" name="btnsubmit" value="submit" class="btn btn-primary" >
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    if(isset($_POST["btnsubmit"]))
    {
        global $con;
        $username= mysqli_real_escape_string($con,$_POST["username"]);
        $password= mysqli_real_escape_string($con,$_POST["password"]);
        $sql="SELECT * from users where username='$username' and password='$password'";
        $query=mysqli_query($con,$sql);
        $num_row=mysqli_num_rows($query);
        if($num_row !=0)
        {
            $_SESSION["loged"]=true;
            header("location:index.php");	
            $_SESSION["username"]=$username;
            
        }else{
            echo'
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                    <p>Tên đăng nhập hoặc mật khẩu sai, vui lòng nhập lại!</p>
                </div>
                </div>  
            </div>';
        }
        
        mysqli_close($con);
    }

    ?>
</div>
</body>
</html>