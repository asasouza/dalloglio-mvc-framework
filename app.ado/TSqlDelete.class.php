<?php
final class TSqlDelete extends TSqlInstruction{

	public function getInstruction(){
		$this->sql = "DELETE FROM {$this->entity}";

		if ($this->criteria) {
			$this->sql .= " WHERE {$this->criteria->dump()}";
		}

		return $this->sql;
	}

}


?>