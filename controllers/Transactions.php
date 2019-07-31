<?php

class Transactions extends Controller {
	protected function Index() {
	#	echo "Transactions::Index:viewmodel: ";  echo"<br/>";
	#	echo "Transactions::Index:get_parent_class: "  . get_parent_class($this) . "<br/>";

		$viewModel = new TransactionModel();
		$this->returnView("views/Transactions/index.php",true);
	}

	protected function fetch() {
		$viewModel = new TransactionModel();
		return $this->returnView($viewModel->fetchTransactions(),true);
	}
	protected function fetchAll() {
		$viewModel = new TransactionModel();
		return $this->returnView($viewModel->fetchAllTransactions(),true);
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
