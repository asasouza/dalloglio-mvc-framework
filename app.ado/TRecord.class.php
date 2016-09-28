<?php
abstract class TRecord{
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
			$sql = new TSqlInsert;
			$sql->setEntity($this->getEntity());
			foreach ($this->data as $key => $value) {
				$sql->setRowData($key, $this->$key);
			}
		}else{
			$sql = new TSqlUpdate;
			$sql->setEntity($this->getEntity());
			$criteria = new TCriteria;
			$criteria->add(new TFilter('id', '=', $this->data['id']));
			$sql->setCriteria($criteria);
			foreach ($this->data as $key => $value) {
				if ($key !== 'id') {
					$sql->setRowData($key, $this->$key);
				}
			}
		}
		if ($conn = TTransaction::get()) {
			TTransaction::log($sql->getInstruction());
			$result = $conn->exec($sql->getInstruction());
			return $result;
		}else{
			throw new Exception("Não há transação ativa!");
			
		}
	}

	public function load($id){
		$sql = new TSqlSelect;
		$sql->setEntity($this->getEntity());
		$sql->addColumn('*');
		$criteria = new TCriteria;
		$criteria->add(new TFilter('id', '=', $id));
		$sql->setCriteria($criteria);
		if ($conn = TTransaction::get()) {
			TTransaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			if ($result) {
				$object = $result->fetchObject(get_class($this));
			}
			return $object;
		}else{
			throw new Exception("Não há transação ativa!!");
			
		}
	}

	public function delete($id){
		$sql = new TSqlDelete;
		$sql->setEntity($this->getEntity());
		$criteria = new TCriteria;
		$criteria->add(new TFilter('id', '=', $id));
		$sql->setCriteria($criteria);
		if ($conn = TTransaction::get()) {
			TTransaction::log($sql->getInstruction());
			$result = $conn->exec($sql->getInstruction());
			return $result;
		}else{
			throw new Exception("Não há transação ativa!!");			
		}
	}

	public function getLast(){
		if ($conn = TTransaction::get()) {
			$sql = new TSqlSelect;
			$sql->setEntity($this->getEntity());
			$sql->addColumn('max(id) as id');
			TTransaction::log($sql->getInstruction());
			$result = $conn->Query($sql->getInstruction());
			$row = $result->fetch();
			return $row[0];
		}else{
			throw new Exception("Não há transação ativa");
			
		}
	}
}
?>