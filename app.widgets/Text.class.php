<?php 
class TextArea extends Field{
	private $label;

	public function __construct($label, $name){
		parent::__construct($name);
		$this->label = $label;

		$this->tag = new Element("textarea");
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
		$this->tag->add(htmlspecialchars($this->value));

		if (!parent::getEditable()) {
			$this->tag->readonly = "1";
		}

		$controlGroup->add($label);
		$controlGroup->add($this->tag);

		$controlGroup->show();
	}

}

?>