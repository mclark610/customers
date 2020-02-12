<?php


class Metrics extends Controller {
	protected function Index() {
#		echo "Controller::Index:viewmodel: "; var_dump($viewModel); echo"<br/>";
#		echo "Controller::Index:get_parent_class: "  . get_parent_class($this) . "<br/>";
#		echo "Controller::Index:get__class: "  . get_class($this) . "<br/>";
#		echo "Controller::viewModel classname: "  . get_class($viewModel) . "<br/>";
#    echo "session: " .$_SESSION['is_logged_in'] . "<br />";
#		echo "rootpath: " . ROOT_URL . "<br/>";
#		echo "ajax: " . ROOT_URL. "/?controller=Metrics&action=Index"."<br/>";
#		$this->ReturnView($viewModel->Index(),true);
    $this->ReturnView('/views/Metrics/index.php',true);
#    echo $this->SalesYearly();
	}

	public function SalesWeekly() {
		$viewModel = new MetricsModel();
		$rst = $viewModel->salesWeekly( '2017');
		$this->ReturnView($rst);
	}

  public function reportYearly() {
		$viewModel = new MetricsModel();
			$this->returnView($viewModel,true);
	}

	public function reportMonthly() {
		$viewModel = new MetricsModel();
			$this->returnView($viewModel,true);
	}

	public function SalesYearly() {

		$viewModel = new MetricsModel();
		$viewModel->salesYearly();
	}

	public function SalesMonthly() {

		$viewModel = new MetricsModel();
		$viewModel->salesMonthly();
	}

  protected function PieDump() {
		$viewModel = new MetricsModel();

	}
}
