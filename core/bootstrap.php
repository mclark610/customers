<?php
class Bootstrap{
  private $controller;
  private $action;
  private $request;

  public function __construct($request){ // Set $request param
    $this->request = $request; // Assign the this request to the $request that comes in
    if($this->request['controller'] == ""){ // Check if this request controller is empty
      $this->controller = 'home'; // controller = home
    } else{
      $this->controller = $this->request['controller']; // controller = whatever comes in
    }
    if($this->request['action'] == ""){ // Check if this request action is empty
      $this->action = 'index'; // action = index
    } else{
      $this->action = $this->request['action']; // action = whatever that comes in
    }
  }

  public function createController(){
    // Check Class
    if(class_exists($this->controller)){
      $parents = class_parents($this->controller);
      // Check Extend
      if(in_array('Controller', $parents)){
        if(method_exists($this->controller, $this->action)){
          return new $this->controller($this->action, $this->request);
        } else{
          // Method Does Not Exist
          echo '<h1>Method does not exist</h1>';
          return;
        }
      } else{
        // Base Controller Not Found
        echo '<h1>Base controller not found</h1>';
        return;
      }
    } else{
      // Controller Class Does Not Exist
      echo '<h1>Controller class does not exist</h1>';
      return;
    }
  }
}
