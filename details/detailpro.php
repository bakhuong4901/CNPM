<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<style>
    .demo {
        text-align: center;
    }

    .images img {
        max-width: 500px;
        height: 700px;
        object-fit: cover;
    }

    p {
        font-family: Arial, Helvetica, sans-serif;
    }

    a {
        text-decoration: none;
        font-size: 23px;
        padding-left: 50px;
    }
    .prev{
     
     transition: all 0.4s ease;
    }
    .prev {
        display: block;
       width: 180px;
       transition: all .4s ease;
    }
    .prev:hover i {
      margin-right: 3px;
    }
</style>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'flight_booking_db');
if (!$conn) {
    die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
}
if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $sqlDetail = "SELECT * FROM hahalolo_data_blogs WHERE id = " .$id;
    $resultRow = mysqli_query($conn, $sqlDetail);
    $row = mysqli_fetch_row($resultRow);
    //  echo "<pre>";
    // print_r($row);
    // die;
?>
    <div class="container">
        <div class="row">

            <div class="prev">
                <a href="../index.php"><i class="bi bi-arrow-left"></i>Home</a>
            </div>

            <div class="col-sm-6">
                <div class="demo">
                    <div class="section">
                        <div class="container">
                            <h2 style="font-size: 30px"><?php echo $row[2]; ?></h2>
                            <div class="child">
                                <h2 style="font-size: 20px"><?php echo $row[2]; ?></h2>
                            </div>
                        </div>
                        <div class="images">
                            <img src="<?php echo $row[1]; ?>" alt="" />
                        </div>

                        <div class="text">
                            <p style="font-size: 17px; font-weight: 500;"><?php echo $row[3]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<h1>No Products</h1>";
}
?>
</html>