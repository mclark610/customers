<?php

class BillingModel extends Model {
	private $sql;
	private $row;

	private $arrCust;

	public function Index() {
		/*
		var_dump($_SESSION);
		var_dump($_SERVER);
		var_dump($_POST);
		var_dump($_GET);
		
		echo "ID:::: $id";

		var_dump($_GET);
		var_dump($id);
		*/

		return $this->fetchTransactions();
	}

	public function fetchCustomerTransactions($id) {
		$limit=100;
        $this->sql = "select "
		             . "  t.id 'id',c.id 'user_id', "
		             . "  c.first 'first', c.last 'last',"
					 . "  c.phone 'phone', date_format(t.date_expired,'%m/%d/%Y') 'expiration',"
					 . "  t.amount 'amount' "
					 . "from customers c "
					 . "  inner join transactions t on c.id = t.user_id "
					 . "  and c.id = :CID "
					 . "group by "
					 .	  "t.id, c.id, c.first,"
					 .	  "c.last, c.phone, t.date_expired,"
					 .	  "t.amount "
					 . "order by "
					 . "  t.date_expired desc "
					 . "LIMIT $limit";

		$this->query($this->sql);
   		$this->bind(':CID', $id);

		return($this->resultSet());
    }

	public function fetchTransactions() {
		$limit=100;
        $this->sql = "select "
					 . "	t.id 'id', "
					 . "    t.user_id 'user_id', "
					 . "	t.amount  'amount' , "
					 . "	t.date_expired 'expiration', "
					 . "    t.date_paid    'date_paid' "
					 . "from "
					 . "	transactions t "
					 . "LIMIT $limit;";

		$this->query($this->sql);
		$this->execute();
		return( $this->resultSet() );
	}

	public function fetchBills() {
		$id = $_GET['id'];
		return $this->fetchCustomerTransactions($id);
	}
}

?>

