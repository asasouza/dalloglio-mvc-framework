<?php
abstract class Record{
	protected $data;

	public function __construct($id = NULL){
		if ($id) {
			$object = $this->load($id);
			if ($object) {
				$this->fromArray($object->toArray());
			}
		}
	}

	public function __clone(){
		unset($this->id);
	}

	public function __set($prop, $value){
		if (method_exists($this, 'set_'.$prop)) {
			call_user_func(array($this, 'set_'.$prop), $value);
		}else{
			$this->data[$prop] = $value;
		}
	}

	public function __get($prop){
		if (method_exists($this, 'get_'.$prop)) {
			return call_user_func(array($this, 'get_'.$prop));
		}else{
			return $this->data[$prop];
		}
	}

	private function getEntity(){
		$classe = strtolower(get_class($this));
		return substr($classe, 0, -6);
	}

	public function fromArray($data){
		$this->data = $data;
	}

	public function toArray(){
		return $this->data;
	}

	public function store(){
		if (empty($this->data['id']) or (!$this->load($this->data['id']))) {
			// $this->id = $this->getLast() + 1;
			$sql = new SQLInsert;
			$sql->setEntity($this->getEntity());
			foreach ($this->data as $key => $value) {
				$sql->setRowData($key, $this->$key);
			}
		}else{
			$sql = new SQLUpdate;
			$sql->setEntity($this->getEntity());
			$criteria = new Criteria;
			$criteria->add(new Filter('id', '=', $this->data['id']));
			$sql->setCriteria($criteria);
			foreach ($this->data as $key => $value) {
				if ($key !== 'id') {
					$sql->setRowData($key, $this->$key);
				}
			}
		}
		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->exec($sql->getInstruction());
			return $result;
		}else{
			throw new Exception("There is no Transaction active!");
			
		}
	}

	public function load($id){
		$sql = new SQLSelect;
		$sql->setEntity($this->getEntity());
		$sql->addColumn('*');
		$criteria = new Criteria;
		$criteria->add(new Filter('id', '=', $id));
		$sql->setCriteria($criteria);
		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			if ($result) {
				$object = $result->fetchObject(get_class($this));
			}
			return $object;
		}else{
			throw new Exception("There is no Transaction active!");
			
		}
	}

	public function delete($id = NULL){
		$id = $id ? $id : $this->id;
		$sql = new SQLDelete;
		$sql->setEntity($this->getEntity());
		$criteria = new Criteria;
		$criteria->add(new Filter('id', '=', $id));
		$sql->setCriteria($criteria);
		if ($conn = Transaction::get()) {
			Transaction::log($sql->getInstruction());
			$result = $conn->exec($sql->getInstruction());
			return $result;
		}else{
			throw new Exception("There is no Transaction active!");			
		}
	}

	public function getLast(){
		if ($conn = Transaction::get()) {
			$sql = new SQLSelect;
			$sql->setEntity($this->getEntity());
			$sql->addColumn('max(id) as id');
			Transaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			$row = $result->fetch();
			return $row[0];
		}else{
			throw new Exception("There is no Transaction active!");
			
		}
	}
}
?>