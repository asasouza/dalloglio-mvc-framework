<?php
class Entry extends Field{
	protected $type;
	protected $label;

	public function __construct($label, $name, $type){
		parent::__construct($name);
		$this->tag->type = $type;
		$this->label = $label;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function show(){
		$controlGroup = new Element("div");
		$controlGroup->addClass("control-group");

		$label = new Element("label");
		$label->for = $this->name;
		$label->add($this->label);
		$label->addClass("control-label");

		$this->tag->name = $this->name;
		$this->tag->value = $this->value;
		$this->tag->addClass("form-control");

		if (!parent::getEditable()) {
			$this->tag->readonly = "1";
		}

		$controlGroup->add($label);
		$controlGroup->add($this->tag);

		$controlGroup->show();
	}
}

?>