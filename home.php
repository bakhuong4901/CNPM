<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .container_box {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;


    }

    .container_box_card .container_image a img {
        width: 320px;
        height: 250px;
        object-fit: cover;
    }

    .main {
        margin-top: -310px;
    }

    .main .text-white {
        margin-right: 500px;
      
        font-size: 20px;
     
    }
    .text {
        color: black;
        font-size: 23px;
        margin-left: 30px;
    }
    .title {
        display: flex;
        justify-content: space-between; 
        align-items: center;
    }
    .title .test {
        
        padding: 8px 15px;
        width: 170px;
        border: none;
        outline: none;
        border-radius: 30px;
        background-color: #26894A;
        color: white;
        font-weight: 600;
        cursor: pointer;
        margin-right: 40px;
    }
    .search {
        width: 160px;
        margin-left: 80px;
        margin-top: 20px;
    }
</style>
<header class="main">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="p-4 align-self-end  page-title">
                <div class="title">
                    <h3 class="text">Tìm kiếm chuyến bay cho hành trình của bạn</h3>
                    <button class="test">Tra cứu đặt chỗ</button>
                </div>
             
                <hr class="divider my-4" />
                <div class="col-md-12 mb-2 text-left">
                    <div class="card">
                        <div class="card-body">
                            <form id="manage-filter" action="index.php?page=flights" method="POST">
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Điểm khởi hành</label>
                                        <select name="departure_airport_id" id="departure_location" class="custom-select browser-default select2">
                                            <option value=""></option>
                                            <?php
                                            $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while ($row = $airport->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'] . ", " . $row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Điểm đến</label>
                                        <select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default select2">

                                            <option value=""></option>

                                            <?php
                                            $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while ($row = $airport->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'] . ", " . $row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Ngày đi</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date" autocomplete="off">
                                    </div>
                                    <div class="col-sm-3" id="rdate" style="display: none">
                                        <label for="" class="control-label">Ngày về</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date_return" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="onewway" value="1" checked>
                                            <label class="form-check-label" for="onewway">
                                                Một chiều
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="rtrip" value="2">
                                            <label class="form-check-label" for="rtrip">
                                                Khứ hồi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 offset-sm-5">
                                        <button class=" search btn btn-block btn-sm btn-primary p-2" type="submit"><i class="fa fa-plane-departure"></i>Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</header>
<section class="page-section" id="menu">
<?php
include 'data.php';
?>
  
    
    <script>
        $('.view_prod').click(function() {
            uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
        })
        $('.select2').select2({
            placeholder: 'Select Departure',
            width: '100%'
        })
        $('[name="trip"]').on("keypress change keyup", function() {
            if ($(this).val() == 1) {
                $('#rdate').hide()
            } else {
                $('#rdate').show()
            }
        })
    </script>

</section>