<?php

class Home extends Controller {
	protected function Index() {
    echo "session: ",$_SESSION['is_logged_in'];

		$this->ReturnView('/views/Home/index.php',true);
	}

	protected function doAjaxTable() {
		$viewModel = new CustomerModel();

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
