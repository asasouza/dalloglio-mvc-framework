<?php
class TDataGridColumn{
	private $name;
	private $label;
	private $action;
	private $transformer;

	public function __construct($name, $label){
		$this->name = $name;
		$this->label = $label;
	}

	public function getName(){
		return $this->name;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setAction(TAction $action){
		$this->action = $action;
	}

	public function getAction(){
		if ($this->action) {
			return $this->action->serialize();
		}
	}

	public function setTransformer($callback){
		$this->transformer = $callback;
	}

	public function getTransformer(){
		return $this->transformer;
	}
}

?>