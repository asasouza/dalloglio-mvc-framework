<?php
class Combo extends Field{
	private $items;
	private $label;

	public function __construct($label, $name){
		parent::__construct($name);
		$this->tag = new Element("select");
		$this->label = $label;
	}

	public function addItems($items){
		$this->items = $items;
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

		$option = new Element("option");
		$option->add("Selecione uma opção");
		$option->value = "";

		$this->tag->add($option);

		if (isset($this->items)) {
			foreach ($this->items as $key => $item) {
				$option = new Element("option");
				$option->value = $key;
				$option->add($item);

				if ($key == $this->value) {
					$option->selected = "1";
				}
				$this->tag->add($option);
			}
		}

		if (!parent::getEditable()) {
			$this->tag->readonly = "1";
		}

		$controlGroup->add($label);
		$controlGroup->add($this->tag);

		$controlGroup->show();
	}
}
?>