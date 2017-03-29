<?php

class Tables extends Controller {
	protected function Index() {
		$viewModel = new TableModel();
		$this->ReturnView($viewModel->Index(),true);
	}
	protected function doAjaxTable() {
		$viewModel = new TableModel();

    	$rset = $viewModel->getTableData2();

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