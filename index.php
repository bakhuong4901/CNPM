<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
  li {
    list-style: none;
  }

  body {
    position: relative;
  }

  .logo_box i {
    font-size: 18px;
    cursor: pointer;
  }

  .close_navbar {
    font-size: 20px;
    color: black;
    cursor: pointer;
    display: none;
  }
  .close_responsive {
    display: none;
  }
 
   .logo img {
     margin-left: 50px;
   }
  @media (max-width: 1080px) {
    .navbar_responsive {
      position: fixed;
      top: 0;
      left: -330px;
      width: 330px;
      max-width: 40rem;
      height: 100vh;
      box-shadow: 0 0 7px 8px rgba(0, 0, 0, 0.4);
      z-index: 100;
      transition: all .4s ease;
     
    }
    .navbar_responsive .navbar {
     
    }

    .navbar_responsive.active {
      left: 0;
    }

    
    .close_navbar {
      display: block;
      position: absolute;
      top: 47%;
      font-size: 24px;
      left: 90%;

    }

    .right .logo_box {
      margin: 0 auto;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .close_responsive {
      display: block;
      cursor: pointer;
      position: absolute;
      left: 80%;
      top: 15px;
      font-size: 23px;
    }
    
    
  }
</style>
<?php
session_start();
ob_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
ob_end_flush();
?>

<style>
  
</style>

<body id="page-top">
  <!-- Navigation-->
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>

  </div>

  <div class="header">
    <div class="container-fluid">
      <div class="row navbar_responsive">
        <nav class="navbar navbar-expand-lg  bg-light">
          <div class="left d-flex">
            <div class="logo">
              <img src="./assets/img/<?php echo $_SESSION['setting_name'] ?>" />
            </div>
          </div>

          <div class="container-fluid active ms-4">
            <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarNav">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Bảng tin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Trải nghiệm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Tour</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Khách sạn</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Vé máy bay</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Cho thuê xe</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Mua sắm</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="right">
            <div class="logo_block d-flex ">

              <div class="logo_box me-4 d-flex justify-content-center align-items-center">
                <i class="bi bi-cart p-3"></i>
                <i class="bi bi-credit-card-2-back p-3"></i>
                <i class="bi bi-messenger p-3"></i>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./admin/login.php"></span>Login</a></li>
              </div>
            </div>

          </div>
        
        
        </nav>
        <div class="close_responsive" >
            <i class="bi bi-x-circle-fill"></i>
          </div>
      </div>
      <div class="close_navbar">
        <i class="bi bi-list"></i>
      </div>
     
    </div>
  </div>

  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  include $page . '.php';
  ?>


 
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
 

  <?php include('footer.php') ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script>
  let navbarRes = document.querySelector(".navbar_responsive");
  let closeNavbar = document.querySelector(".close_navbar");
  let closeRes = document.querySelector(".close_responsive");
  closeNavbar.addEventListener('click', function(e) {
    navbarRes.classList.toggle("active");
    
  })

  closeRes.addEventListener('click', function(e) {
    navbarRes.classList.toggle("active");
  })

</script>
<?php $conn->close() ?>

</html>