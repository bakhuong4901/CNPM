<?php
    
    $ma_nhanvien = $_GET['id'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','flight_booking_db');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "DELETE FROM users WHERE id = '$id'";

    $number = mysqli_query($conn,$sql);

    if($number > 0){
        header("location: admin.php");
    }else{
        header("location: error.php");
    }
?>