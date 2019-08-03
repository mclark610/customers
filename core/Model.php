<?php
abstract class Model {
	protected $dbh;
	protected $stmt;

	public function __construct(){
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	//Binds the prep statement
	public function bind($param, $value, $type = null){
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		#echo "<Br/>---BIND DEBUG BEGIN---<br/>\n";
		#var_dump($param); echo "<br/>";
		#var_dump($value); echo "<br/>";
		#var_dump($type); echo "<br/>";
		#echo "---BIND DEBUG END---<br/>\n";

		$this->stmt->bindValue($param, $value, $type);

	}

	public function execute(){
		if ( $this->stmt->execute() ) {
		#	echo "EXECUTE WORKED FINE<BR/>\n";
		}
		else {
		#	echo "EXECUTE DIDNT WORK!!!! FINE<BR/>\n";
		#	var_dump($this->stmt->errorInfo());
		}
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function dump_params() {
		print_r($this->dbh->errorInfo());

		return $this->stmt->debugDumpParams();
	}
}
?>
