<?php
class Users extends Controller {

	protected function register() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(),true);

	}

	protected function login() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(),true);
//		$this->returnView("https://cust.casualcoder.net/?Users/login.php",1);
	}

	protected function logout() {
		$viewmodel = new UserModel();
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();

		header('Location: '.ROOT_URL);
		//$this->returnView($viewmodel->logout(),true);
	}

}
