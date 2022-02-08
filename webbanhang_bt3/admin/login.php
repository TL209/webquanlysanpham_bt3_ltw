<?php
    $u = $_POST['username'];
    $p = $_POST['password'];

    $db = mysqli_connect("localhost","root","","bt3_ltw");

    $sql = "select * from users where username = '$u' and password = '$p'";

    $rs = mysqli_query($db, $sql);

    if(mysqli_num_rows($rs) > 0){
        echo "<h1>Đăng nhập thành công</h1>";
        header("Location: category/index.php");
    }else{
        echo "<h2>Thất bại</h2>";

        require_once 'admin-login.php';
    }
?>