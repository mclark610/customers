<?php
/* http://localhost/mvc/{controller}/{action}/{index} */
/*
 * Bootstrap
 *    This object decides which controller needs to be created and called based
 *    on the incoming url.  This object will be created and called every time the
 *    user sends a url.
 *    Works in conjunction with .htaccess Rewrite setting.
 *
 * Reference:
 * Udemy PHP oo - boston guy.  Awesome invaluable course!!!
 * https://www.udemy.com/learn-object-oriented-php-by-building-a-complete-website/learn/v4/content
 *
 */
class Bootstrap {
	private $controller;
	private $action;
	private $request;

	public function __construct($request) {
	    $this->request = $request;
			/*
			if (!isset($request) || !$request = '') {
				 echo "Bootstrap::_construct:request: "; var_dump($request);
				 echo "<br/>";
			 }
			 else {
				 echo "Bootstrap::_construct:request:request is empty";
				 echo "<br/>";
			 }
		 if (!isset($this->request['controller'])|| ($this->request['controller'] == "")) {
			 echo "Bootstrap::_construct:request-controller: " . $request->controller ."<br/>";
     }
		 else {
			 echo "Bootstrap::_construct:request-controller: does not exist";
		 }
		*/
//	    if ($this->request['controller'] == "") {
    	if (!isset($this->request['controller'])|| ($this->request['controller'] == "")) {
	    	$this->controller = 'Customers';
	    }
	    else {
	    	$this->controller = $this->request['controller'];
	    }


	    //Index
	    #if (($this->request['action'] == "")) {
	    if (!isset($this->request['action']) || ($this->request['action'] == "")) {
	    	$this->action = 'index';
##				echo "Bootstrap::_construct:action: " . $request['action'] ."<br/>";
	    	#var_dump($this->action);
	    }
	    else {
	    	$this->action = $this->request['action'];
	    }
/*
			echo "Bootstrap::_construct:controller: " . $controller ."<br/>";
			echo "Bootstrap::_construct:action    : " . $action ."<br/>";
			echo "Bootstrap::_construct:request   : " ; var_dump($request);
			echo "<br/><br/>";
*/
//	}
}

	public function createController() {
		#var_dump($this->controller);
/*
		echo "<br/>Bootstrap::createController:request2: ". var_dump($request) .'<br/>';

		echo "Bootstrap::createController:request2->controller: [[" . $this->controller . "]]";
		echo "<br/>";
		echo "Bootstrap::createController:request2a-controller: [[" . $request['controller'] . "]]";
*/
		if ( class_exists($this->controller)) {
			$parents = class_parents($this->controller);
##			echo "Bootstrap::createController:class_parents: ";  var_dump($this->controller); echo "<br/>";

			if (in_array("Controller",$parents)) {
			    if ( method_exists($this->controller,$this->action)) {
					return new $this->controller($this->action,$this->request);
				}
				else {
					echo "<h2>Method " . $this->action ." does not exist<br/>\n";
				}
			}
			else {
				echo "<h2>Controller [method] " . $this->controller . " [action] " . $this->action . " does not exist<br />\n";
			}
		}
		else {
			echo "<h2>Controller [in_array] " . $this->controller . " does not exist<br />\n";
		}
/*
		echo "Bootstrap::createController:controller: " . $controller ."<br/>";
		echo "Bootstrap::createController:action    : " . $action ."<br/>";
		echo "Bootstrap::createController:request   : " . var_dump($request) ."<br/>";
		echo "<br/><br/>";
*/
	}
}
