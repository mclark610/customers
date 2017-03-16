<?php

class Billing extends Controller {
	protected function Index() {
		$viewModel = new BillingModel();
		$this->ReturnView($viewModel->Index(),true);
	}

	protected function Fetch() {
		$viewModel = new BillingModel();
		return $this->ReturnView($viewModel->fetchBills(),true);
	}
}
