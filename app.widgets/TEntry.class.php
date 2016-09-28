<?php
class TEntry extends TField{
	protected $type;
	protected $formLabel;

	public function __construct($label, $name, $type){
		parent::__construct($name);
		$this->tag->type = $type;
		$this->formLabel = $label;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function show(){
		$controlGroup = new TElement('div');
		$controlGroup->addClass("control-group");

		$label = new TElement('label');
		$label->for = $this->name;
		$label->add($this->formLabel);
		$label->addClass("control-label");

		$this->tag->name = $this->name;
		$this->tag->value = $this->value;
		$this->tag->addClass("form-control");

		if (!parent::getEditable()) {
			$this->tag->readonly = '1';
		}

		$controlGroup->add($label);
		$controlGroup->add($this->tag);

		$controlGroup->show();
	}
}

?>