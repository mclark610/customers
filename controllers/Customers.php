<?php

class Customers extends Controller {
	protected function Index() {
		$viewModel = new CustomerModel();
		$this->ReturnView($viewModel->Index(),true);
	}
}