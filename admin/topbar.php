<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
.left_box {
  display: flex;
  justify-content: center;
  align-items: center;
}
h4 {
  margin-top: 10px;
  margin-left: -30px;
} 

</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12 ">
  		<div class="col-md-1 float-left left_box" >
  			<div class="logo">
  				<span class="fa fa-plane-departure"></span>
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
       <h4>Hahalolo</h4>
      </div>
	  	<div class=" logout col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>