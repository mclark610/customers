<?php 

class TableModel extends Model {
	private $sql;
    private $row;
    private $limit=55;

	private $arrCust;

    public function Index() {
		return $this->fetchCustomers();
    }
    
	public function getTableData() {
        $this->sql = "select " 
		             .  "t.id 'id',c.id 'user_id', "
		             .  "c.first 'first', c.last 'last', "
					 .  "c.phone 'phone', date_format(t.date_expired,'%m/%d/%Y') 'expiration', "
					 .  "t.amount 'amount' "
					 ."from " 
					 .   "customers c "
					 ."inner join transactions t on c.id = t.user_id "
					 ."LIMIT $this->limit";
	    $this->query($this->sql);
		
		return($this->resultSet());
	}

	public function getTableData2() {
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

	public function buildCustomerPagination($activePage=1) {
		$this->sql = "select count(*) from customers c inner join transactions t on c.id=t.id";
	    $this->query($this->sql);
        $numCustomers = $this->resultSet();
        
		$text = <<<EOT
			<ul class="pager">
				<li><a href="#">Previous</a></li>
				<li><a href="#">Next</a></li>
			</ul>
EOT;

		return($text);

	}

    public function fetchCustomers( $pageNum=1,$numPerPage=10 ) {
		
        $this->sql = "select " 
		             .  "t.id 'id',c.id 'user_id', "
		             .  "c.first 'first', c.last 'last', "
					 .  "c.phone 'phone', date_format(t.date_expired,'%m/%d/%Y') 'expiration', "
					 .  "t.amount 'amount' "
					 ."from " 
					 .   "customers c "
					 ."inner join transactions t on c.id = t.user_id "
					 ."LIMIT $this->limit";
	    $this->query($this->sql);

		return($this->resultSet());
		

#		$arr['data'] = $this->fetchPage();
#		$arr['pager'] = $this->buildCustomerPagination();

#		return $arr;
    }

	public function fetchPage($pageNum=1,$numPerPage=10) {
		$offset = $pageNum * $numPerPage;

        $this->sql = "select " 
		             .  "t.id 'id',c.id 'user_id', "
		             .  "c.first 'first', c.last 'last', "
					 .  "c.phone 'phone', date_format(t.date_expired,'%m/%d/%Y') 'expiration', "
					 .  "t.amount 'amount' "
					 ."from " 
					 .   "customers c "
					 ."inner join transactions t on c.id = t.user_id "
					 ."LIMIT $numPerPage OFFSET $offset";
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
?>

