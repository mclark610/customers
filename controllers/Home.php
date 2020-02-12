<?php

class Home extends Controller {
	protected function Index() {
    echo "Home session: ",$_SESSION['is_logged_in'];
	file_put_contents($_SERVER['DOCUMENT_ROOT']."/log/test.log","HomeController:index:SESSION_LOGGED_IN: " . $_SESSION['is_logged_in'] . "\n",FILE_APPEND);
	file_put_contents($_SERVER['DOCUMENT_ROOT']."/log/test.log","HomeController:index:view: " . ROOT_URL.'?Home/index' . "\n",FILE_APPEND);
		$viewModel = new HomeModel();

		$this->ReturnView( $viewModel->Index(),true);
	}

}
