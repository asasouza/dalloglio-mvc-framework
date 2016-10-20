<?php
class TRadioGroup extends TField{
	private $items;
	private $layout;
	private $label;

	public function __construct($label, $name){
		parent::__construct($name);
		$this->label = $label;
	}

	public function setLayout($layout){
		$this->layout = $layout;
	}

	public function addItems($items){
		$this->items = $items;
	}

	public function show(){
		if ($this->items) {
			$label = new TElement("label");
			$label->add($this->label);
			$div = new TElement("div");
			
			foreach ($this->items as $index => $text) {
				$radiobutton = new TRadioButton("{$this->name}[]", $text);
				$radiobutton->setValue($index);
				if (@in_array($index, $this->value)) {
					$radiobutton->setProperty('checked', '1');
				}
				if($this->layout){
					$radiobutton->setLayout($this->layout);
				}
				$div->add($radiobutton);
			}
			$label->add($div);
			$label->show();
		}
	}
}
?>