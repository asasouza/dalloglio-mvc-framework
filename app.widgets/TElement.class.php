<?php
class TElement{
	private $name;
	private $class;
	private $properties;
	protected $children;

	public function __construct($name, $class = NULL){
		$this->name = $name;
		$this->class = $class;
	}

	public function __set($name, $value){
		$this->properties[$name] = $value;
	}

	public function setClass($class){
		$this->class = $class;
	}

	public function addClass($class){
		$this->class = is_null($this->class) ? $class : $this->class . " " . $class;
	}

	public function add($child){
		$this->children[] = $child;
	}

	private function open(){
		echo "<{$this->name}";
		if ($this->class) {
			echo " class=\"{$this->class}\"";
		}
		if ($this->properties) {
			foreach ($this->properties as $name => $value) {
				echo " {$name}=\"{$value}\" ";
			}
		}
		echo ">";
	}

	private function close(){
		echo "</{$this->name}>\r\n";
	}

	public function show(){
		$this->open();
		echo "\r\n";
		if ($this->children) {
			foreach ($this->children as $child) {
				if (is_object($child)) {
					$child->show() . "\r\n";
				}
				elseif (is_string($child) or is_numeric($child)) {
					echo $child;
				}
			}
		}
		$this->close();
	}
}

?>