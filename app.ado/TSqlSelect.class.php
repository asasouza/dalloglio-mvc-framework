<?php
final class TSqlSelect extends TSqlInstruction{

	public function addColumn($column){
		$this->columns[] = $column;
	}

	public function getInstruction(){
		$this->sql = "SELECT ";
		$this->sql .= implode(", ", $this->columns);
		$this->sql .= " FROM {$this->entity}";
		if ($this->criteria) {
			if ($this->criteria->hasExpressions()) {
				$this->sql .= " WHERE {$this->criteria->dump()}";
			}		

			$order = $this->criteria->getProperty('order');
			$limit = $this->criteria->getProperty('limit');
			$offset = $this->criteria->getProperty('offset');

			if ($order) {
				$this->sql .= ' ORDER BY ' . $order;
			}
			if ($limit) {
				$this->sql .= ' LIMIT ' . $limit;
			}
			if ($offset) {
				$this->sql .= ' OFFSET ' . $offset;
			}
		}

		return $this->sql;
	}
}

?>