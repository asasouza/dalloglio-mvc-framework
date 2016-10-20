<?php
class TForm{
	protected $fields;
	private $name;
	private $tag;

	public function __construct($name){
		$this->name = $name;
		$this->tag = new TElement('form');
		$this->tag->name = $this->name;
		$this->tag->method = 'POST';
		$this->tag->enctype = "multipart/form-data";
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setEditable($bool){
		if ($this->fields) {
			foreach ($this->fields as $object) {
				$object->setEditable($bool);
			}
		}
	}

	public function addField(TField $field){
		$this->fields[$field->getName()] = $field;
	}

	public function setFields($fields){
		foreach ($fields as $field) {
			if ($field instanceof TField) {
				$this->fields[$field->getName()] = $field;
			}
			if ($field instanceof TButton) {
				$field->setFormName($this->name);
			}
		}
	}

	public function getField($name){
		return $this->fields[$name];
	}

	public function setData($object){
		foreach ($this->fields as $name => $field) {
			if ($name and (!$field instanceof TButton)) {
				$field->setValue($object->$name);
			}
		}
	}

	public function getData($class = 'StdClass'){
		$object = new $class;
		foreach ($_POST as $key => $val) {
			if (get_class($this->fields[$key]) == "TCombo") {
				if ($val != '0') {
					$object->$key = $val;
				}
			}else{
				$object->$key = $val;
			}
		}
		foreach ($_FILES as $key => $content) {
			$object->$key = $content['tmp_name'];
		}
		return $object;
	}

	public function setProperty($name, $value){
		$this->tag->$name = $value;
	}

	public function show(){
		foreach ($this->fields as $field) {
			$this->tag->add($field);
		}
		$this->tag->show();
	}


}
?>