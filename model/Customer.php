<?php

class CustomerModel extends Model {
  	private $sql;
    private $row;
	  private $limit=10;
	  private $arrCust;

    public function Index() {
		   // return $this->fetchCustomers();
    }

  
    public function fetchCustomers( $limit=10 ) {
        $stmt = '';

        $this->sql = "select t.id 'id',c.id 'user_id', c.first 'first', c.last 'last', c.phone 'phone', date_format(t.date_expired,'%m/%d/%Y') 'expiration',t.amount 'amount' from customers c inner join transactions t on c.id = t.user_id LIMIT $limit";
	      $this->query($this->sql);

		    return($this->resultSet());
    }

	  public function getTableData() {
        $this->sql = "select "
		             .  "c.id 'id', "
		             .  "c.last 'last', "
		       			 .  "date_format(t.date_expired,'%m/%d/%Y') 'expiration' "
					       ."from "
					       .   "customers c "
					       ."inner join transactions t on c.id = t.user_id "
					       ."LIMIT $this->limit";

	      $this->query($this->sql);

				return($this->resultSet());
		}

}

/*
function test()  {

	$user   = "customer";
	$pwd    = "customer";
	$dbname = "customer_data";

	$dbhost="localhost";
        $dbuser="customer";
        $dbpass="customer";
        $dbname="customer_data";
        $dsn="mysql:host=$dbhost;dbname=$dbname;charset=utf8;";

	$td;
	$obj_array = array();

	try {
	    $td = new CustomerModel($dsn,$user,$pwd);
	    $obj_array = $td->fetchCustomers(100);

	    echo "array count: " .    count($obj_array) . "\n";
	    if (count($obj_array)>0) {
	       echo "test " . $obj_array[0]->toString() . "\n";
	    }
	    else {
	        echo "array is empty.\n";
	    }
	}
	catch (PDOException $e) {
	   echo "exception thrown : " . $e->getMessage() . "\n";
	}
}

#test();
*/
