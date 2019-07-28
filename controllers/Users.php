<?php
class Users extends Controller {
	protected function Index() {
		$viewmodel = new UserModel();
	}

	protected function register() {
		$viewmodel = new UserModel();
		#$this->returnView($viewmodel->register(),true);

	}

	protected function login() {
		echo "Users:login: " . "begin";
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(),true);
		//$this->returnView("https://cust.casualcoder.net/?Users/login.php",1);
	}

	protected function logout() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->logout(),true);
	}

}
