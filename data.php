<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</head>
<style>
 
</style>
<body>
    <main>
        <div class="container data">
            <div class="row">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'flight_booking_db');
                if (!$conn) {
                    die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                }

                // Bước 02: Thực hiện truy vấn
                $sql = "SELECT * FROM hahalolo_data_blogs";
                $result = mysqli_query($conn, $sql);
                // Bước 03: Xử lý kết quả truy vấn
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row["id"];

                ?>

                        <div class="container_box col-md-4 mt-4 ">
                            <div class="container_box_card col-md-12">
                                <div class="container_image">
                                    <a href="http://localhost:88/baitaplon_hahalolo/details/detailpro.php?view=detail&id=<?php echo $id; ?>">
                                        <img href src="./images/<?php echo $row['images_name']; ?>" />
                                    </a>
                                </div>
                                <div class="container_info">
                                    <p style="font-size: 17px" class="mt-3"><?php echo $row['title']; ?></p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>