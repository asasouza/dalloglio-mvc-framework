<?php
abstract class SQLInstruction{
	protected $sql;
	protected $criteria;

	final public function setEntity($entity){
		$this->entity = strtolower($entity);
	}

	final public function getEntity(){
		return $this->entity;
	}

	public function setCriteria(Criteria $criteria){
		$this->criteria = $criteria;
	}

	abstract function getInstruction();
}

?>