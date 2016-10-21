<?php
final class Repository{

	private $class;

	public function __construct($class){
		$this->class = $class;
	}

	public function load(Criteria $criteria){
		$sql = new SQLSelect;
		$sql->addColumn('*');
		$sql->setEntity($this->class);
		$sql->setCriteria($criteria);
		$results = array();
		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			if ($result) {
				while ($row = $result->fetchObject($this->class.'Record')) {
					$results[] = $row;
				}
				return $results;
			}
		}else{
			throw new Exception("There is no Transaction active!");
		}
	}

	public function delete(Criteria $criteria){
		$sql = new SQLDelete;
		$sql->setEntity($this->class);
		$sql->setCriteria($criteria);

		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->exec($sql->getInstruction());
			return $result;
		}else{
			throw new Exception("There is no Transaction active!");
			
		}
	}

	public function count(Criteria $criteria){
		$sql = new SQLSelect;
		$sql->addColumn("COUNT(*)");
		$sql->setEntity($this->class);
		$sql->setCriteria($criteria);

		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			if ($result) {
				$row = $result->fetch();
			}
			return $row[0];
		}else{
			throw new Exception("There is no Transaction active!");
		}
	}
}

?>