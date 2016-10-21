<?php

class Filter extends Expression{
	private $variable;
	private $operator;
	private $value;

	public function __construct($variable, $operator, $value){
		$this->variable = $variable;
		$this->operator = strtoupper($operator);
		$this->value = $this->transform($value);
	}

	private function transform($value){
		if (is_array($value)) {
			foreach ($value as $x) {
				if (is_integer($x)) {
					$foo[] = $x;
				}elseif (is_string($x)) {
					$foo[] = "'$x'";
				}
			}
			$result = '(' . implode(',', $foo) . ')';
		}elseif (is_string($value)) {
			$result = "'$value'";
		}elseif (is_null($value)) {
			$result = 'NULL';
		}elseif (is_bool($value)) {
			$result = $value ? 'TRUE' : 'FALSE';
		}else{
			$result = $value;
		}
		return $result;
	}

	public function dump(){
		return "{$this->variable} {$this->operator} {$this->value}";
	}
}

?>