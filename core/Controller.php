<?php
abstract class Controller {
	protected $request;
	protected $action;

	public function __construct($action,$request) {
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction() {
		return $this->{$this->action}();
	}

	protected function returnView( $viewmodel, $fullview ) {
		//echo "Controller::returnView:viewmodel: "; var_dump($viewmodel); echo"<br/>";
		//echo "Controller::returnView:fullview : " . $fullview ."<br/>";
		//echo "Controller::returnView:action : " . $action ."<br/>";

        $view = 'views/'.get_class($this).'/'.$this->action.'.php';

	//			echo "Controller::view : " . $view ."<br/>";
	//echo "<br/><br/>";

	#if (!isset($this->request['controller'])|| ($this->request['controller'] == "")) {
        if ( $fullview ) {
            require('views/main.php');
        }
        else {
            require($view);
        }
    }
}
?>
