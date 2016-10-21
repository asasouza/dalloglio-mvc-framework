<?php
class Criteria extends Expression{
	private $expressions;
	private $operators;
	private $properties;

	public function add(Expression $expression, $operator = self::AND_OPERATOR){
		if (empty($this->expressions)) {
			$operator = '';
		}
		$this->expressions[] = $expression;
		$this->operators[] = $operator;
	}

	public function dump(){
		if (is_array($this->expressions)) {
			$result = '';
			foreach ($this->expressions as $i => $expression) {
				$operator = $this->operators[$i];
				$result .= $operator . ' ' . $expression->dump() . ' ';
			}
			$result = trim($result);
			return "({$result})";
		}
	}

	public function setProperty($property, $value){
		$this->properties[$property] = $value;
	}

	public function getProperty($property){
		if (isset($this->properties)) {
			if (array_key_exists($property, $this->properties)) {
				return $this->properties[$property];
			}else{
				return NULL;
			}	
		}		
	}

	public function hasExpressions(){
		if ($this->expressions) {
			return true;
		}
	}
}


?>