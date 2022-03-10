<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	// function signup(){
	// 	extract($_POST);
	// 	$data = " name = '$name' ";
	// 	$data .= ", contact = '$contact' ";
	// 	$data .= ", address = '$address' ";
	// 	$data .= ", username = '$email' ";
	// 	$data .= ", password = '".md5($password)."' ";
	// 	$data .= ", type = 3";
	// 	$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
	// 	if($chk > 0){
	// 		return 2;
	// 		exit;
	// 	}
	// 		$save = $this->db->query("INSERT INTO users set ".$data);
	// 	if($save){
	// 		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
	// 		if($qry->num_rows > 0){
	// 			foreach ($qry->fetch_array() as $key => $value) {
	// 				if($key != 'passwors' && !is_numeric($key))
	// 					$_SESSION['login_'.$key] = $value;
	// 			}
	// 		}
	// 		return 1;
	// 	}
	// }

	
	function save_flight(){
		extract($_POST);
		$data = " airline_id = '$airline' ";
		$data .= ", plane_no = '$plane_no' ";
		$data .= ", departure_airport_id = '$departure_airport_id' ";
		$data .= ", arrival_airport_id = '$arrival_airport_id' ";
		$data .= ", departure_datetime = '$departure_datetime' ";
		$data .= ", arrival_datetime = '$arrival_datetime' ";
		$data .= ", seats = '$seats' ";
		$data .= ", price = '$price' ";
		
		if(empty($id)){
			// echo "INSERT INTO flight_list set ".$data;
			$save = $this->db->query("INSERT INTO flight_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE flight_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_flight(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM booked_flight where id = ".$id);
		if($delete)
			return 1;
	}
	function book_flight(){
		extract($_POST);
		foreach ($name as $k => $value) {
			$data = " flight_id = $flight_id ";
			$data .= " , name = '$name[$k]' ";
			$data .= " , address = '$address[$k]' ";
			$data .= " , contact = '$contact[$k]' ";

			$save[] = $this->db->query("INSERT INTO booked_flight set ".$data);
		}
		if(isset($save))
			return 1;
	}
	function update_booked(){
		extract($_POST);
			$data = "  name = '$name' ";
			$data .= " , address = '$address' ";
			$data .= " , contact = '$contact' ";

			$save= $this->db->query("UPDATE booked_flight set ".$data." where id =".$id);
		if($save)
			return 1;
	}
}