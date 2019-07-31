<?php

class TransactionModel extends Model {
	private $sql;
	private $row;

	private $limit = 100;

	public function index() {
		return $this->fetchTransactions();
	}

	public function fetch() {
		return $this->fetchCustomerTransactions();
	}
	public function fetchCustomerTransactions() {
		$id = $_GET['id'];
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
					 . "LIMIT $this->limit";

		$this->query($this->sql);
   		$this->bind(':CID', $id);

		return($this->resultSet());
    }

	public function fetchAllTransactions() {
		$this->sql = "select "
					 . "	t.id 'id', "
					 . "    t.user_id 'user_id', "
					 . "	t.amount  'amount' , "
					 . "	t.date_expired 'expiration', "
					 . "    t.date_paid    'date_paid' "
					 . "from "
					 . "	transactions t "
					 . "group by "
					 . "    t.id, "
					 . "    t.user_id, "
					 . "    t.amount, "
					 . "    t.date_expired, "
					 . "    t.date_paid "
					 . "order by "
					 . "    t.date_expired desc "
					 . "LIMIT $this->limit;";

		$this->query($this->sql);
		$this->execute();
		return( $this->resultSet() );
	}

	public function getTableData() {
        $this->sql = "select "
					 . "	t.id 'id', "
					 . "    t.user_id 'user_id', "
					 . "	t.amount  'amount' , "
					 . "	t.date_expired 'expiration', "
					 . "    t.date_paid    'date_paid' "
					 . "from "
					 . "	transactions t "
					 . "group by "
					 . "    t.id, "
					 . "    t.user_id, "
					 . "    t.amount, "
					 . "    t.date_expired, "
					 . "    t.date_paid "
					 . "order by "
					 . "    t.date_expired desc "
					 ."LIMIT $this->limit";
	    $this->query($this->sql);

		return($this->resultSet());
	}
}

?>
