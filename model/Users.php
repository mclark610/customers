<?php 
    //require('Model.php');
    //require('Customer.php');


class UserModel extends Model {

    public function Index() {
    	return;
    }
    
    public function login() {
    	// Sanitize POST
    	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    	
    	$password = md5($post['password']);
    	
    	if($post['submit']){
    		// Compare Login
    		$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
    		$this->bind(':email', $post['email']);
    		$this->bind(':password', $password);
    	
    		$row = $this->single();
    	
    		if($row){
    			$_SESSION['is_logged_in'] = true;
    			$_SESSION['user_data'] = array(
    					"id"    => $row['id'],
    					"name"  => $row['name'],
    					"email" => $row['email']
    			);
    			header('Location: '.ROOT_URL.'Customers/index');
    		} 
    		else {
    			Messages::setMsg('Incorrect Login', 'error');
    		}
    	}
    	
    }

    public function register() {
    	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    	
    	$password = md5($post['password']);
    	
    	if($post['submit']){
    		if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
    			Messages::setMsg('Please Fill In All Fields', 'error');
    			return;
    		}
   		
    		
    		// Insert into MySQL
    		$this->query("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");
    		$this->bind(':name', $post['name']);
    		$this->bind(':email', $post['email']);
    		$this->bind(':password', $password);
    		
    		$this->dump_params();
    		$this->execute();
    		// Verify
    		if($this->lastInsertId()){
    			// Redirect
    			header('Location: '.ROOT_URL.'Users/login');
    		}

    	}
    	return;
    }
    
    public function isInSystem() {
        
        $this->sql = "select user,pwd from users where user = :user";
	    $stmt = $this->pdo->query($this->sql);
	    
        
	    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	    echo "id<$row->id> amount<$row->amount> date_expired<$row->expiration>\n";
#	        $t = new Customer($row->id,$row->first,$row->last,$row->phone);
#            array_push($this->arrCust,$t);    
	    }

 #       return $this->arrCust;
    }
}


?>

