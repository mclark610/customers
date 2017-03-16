<?php
class Users extends Controller {
	protected function Index() {
		$viewmodel = new UserModel();
	}
	
	protected function register() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(),true);
		
	}
	
	protected function login() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(),true);
	}

	protected function logout() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->logout(),true);
	}

}