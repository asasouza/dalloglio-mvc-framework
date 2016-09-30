<?php
class TCheckGroup extends TField{
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
				$checkbutton = new TCheckButton("{$this->name}[]", $text);
				$checkbutton->setValue($index);
				if (@in_array($index, $this->value)) {
					$checkbutton->setProperty('checked', '1');
				}
				if($this->layout){
					$checkbutton->setLayout($this->layout);
				}
				$div->add($checkbutton);
			}
			$label->add($div);
			$label->show();
		}
	}
}
?>