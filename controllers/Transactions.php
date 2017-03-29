<?php

class Transactions extends Controller {
	protected function Index() {
		$viewModel = new TransactionModel();
		$this->ReturnView($viewModel->Index(),true);
	}

	protected function Fetch() {
		$viewModel = new TransactionModel();
		return $this->ReturnView($viewModel->Fetch(),true);
	}

	protected function ajaxCustomerTransactions() {
		$viewModel = new TransactionModel();
		$rset = $viewModel->fetchCustomerTransactions();

		$count = count($rset);

		$buf = json_encode($rset);

		$test=<<<EOT
		{
 "draw": 1,
  "recordsTotal": $count,
  "recordsFiltered": 0,
  "data": $buf
}		
EOT;
	echo $test;
		#return($buf);
		#$this->ReturnView(json_encode($buf),false);

	}
	
	protected function doAjaxTable() {
		$viewModel = new TransactionModel();

    	$rset = $viewModel->getTableData();

		$count = count($rset);

		$buf = json_encode($rset);

		$test=<<<EOT
		{
 "draw": 1,
  "recordsTotal": $count,
  "recordsFiltered": 0,
  "data": $buf
}		
EOT;
	echo $test;
		#return($buf);
		#$this->ReturnView(json_encode($buf),false);
	}
}
