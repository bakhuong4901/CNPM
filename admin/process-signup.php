<?php
    //coi vấn đề đó không tồn tại ở đây
    if(!isset($_POST['btnSignUp'])){
  
        header("location:signup.php");
    }

    // Tôi coi một dữ liệu là hợp lệ
    $user = $_POST['txtName'];
    $email = $_POST['txtUsername'];
    $address= $_POST['txtaddress'];
    $contact= $_POST['txtcontact'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];

    // Mục tiêu: CHÈN BẢN GHI ĐĂNG KÍ TÀI KHOẢN vào CSDL nhưng PHẢI KIỂM TRA NÓ ĐÃ TỒN TẠI không đã
    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','flight_booking_db');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // $email = htmlspecialchars($email)
    //header ("location: login.php?error=?email")
    // Bước 02: Thực hiện truy vấn
    $sql01 = "SELECT * FROM users WHERE  username='$user'";
    // Ở đây còn có các vấn đề về tính hợp lệ dữ liệu nhập vào FORM
    // Nghiêm trọng: lỗi SQL Injection

    $result = mysqli_query($conn, $sql01);
    if(mysqli_num_rows($result)>0){
        $error = "Username or email is existed";
        header("location: signup.php?error=$error");//chuyển hướng hiển thị thông báo lỗi
    }else{
        $pass_md5 = md5($pass1);
        // $pass_hash = password_hash($pass1,  PASSWORD_DEFAULT);
        $sql02="INSERT INTO users (name,address,contact,username, password) VALUES('$user','$address','$contact','$email', '$pass1')";
        $result02 = mysqli_query($conn, $sql02);

        if($result02 == true){
            header("location: login.php");
        }else{
            $error = "Can not insert record. Please check ...";
            header("location: signup.php?error=$error");//chuyển hướng hiển thị thông báo lỗi
        }
    }
    // Bước 03: Đóng kết nối
    mysqli_close($conn);

?>