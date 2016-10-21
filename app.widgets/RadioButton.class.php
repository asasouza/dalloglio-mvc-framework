<?php
class RadioButton extends Field{

	private $label;
	private $layout;

	public function __construct($name, $label){
		parent::__construct($name);
		$this->label = $label;
		$this->tag->type = "radio";
	}

	public function setLayout($layout){
		$this->layout = $layout;
	}

	public function show(){
		$div = new Element("div");
		$div->setClass("radio");

		$label = new Element("label");

		if ($this->layout) {
			$div->addClass($this->layout);
		}

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