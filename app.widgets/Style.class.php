<?php
class Style{
	private $name;
	private $properties;
	static private $loaded;

	public function __construct($name){
		$this->name = $name;
	}

	public function __set($name, $value){
		$name = str_replace('_', '-', $name);
		$this->properties[$name] = $value;
	}

	public function show(){
		if (!self::$loaded[$this->name]) {
			echo "<style type='text/css' media='screen'>\r\n";
			echo "{$this->name}";
			echo "{\r\n";
			if ($this->properties) {
				foreach ($$this->properties as $name => $value) {
					echo "\t {$name}: {$value};\n";
				}
			}
			echo "}\n"
		}
	}
}

?>