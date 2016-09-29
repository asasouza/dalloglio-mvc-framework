<?php
class TCheckButton extends TField{

	private $label;

	public function __construct($name, $label){
		parent::__construct($name);
		$this->label = $label;
		$this->tag->type = "checkbox";
	}

	public function show(){
		$div = new TElement("div");
		$div->setClass("checkbox");

		$label = new TElement("label");

		$this->tag->name = $this->name;
		$this->tag->value = $this->value;

		if (!parent::getEditable()) {
			$this->tag->readonly = "1";
		}

		$label->add($this->tag);
		$label->add($this->label);

		$div->add($label);

		$div->show();
	}

}


?>