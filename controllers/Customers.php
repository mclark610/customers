<?php

class Customers extends Controller {
	protected function Index() {
		$viewModel = new CustomerModel();
#		echo "Controller::Index:viewmodel: "; var_dump($viewModel); echo"<br/>";
#		echo "Controller::Index:get_parent_class: "  . get_parent_class($this) . "<br/>";
#		echo "Controller::Index:get__class: "  . get_class($this) . "<br/>";
#		echo "Controller::viewModel classname: "  . get_class($viewModel) . "<br/>";
#		echo "rootpath: ",ROOT_URL;
#		echo "ajax: " , ROOT_URL. "/?controller=Customers&action=doAjaxTable";
		$this->ReturnView($viewModel->Index(),true);
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
