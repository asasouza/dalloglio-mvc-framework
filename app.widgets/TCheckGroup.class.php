<?php
class TCheckGroup extends TField{
	private $items;
	private $layout;

	public function setLayout($layout){
		$this->layout = $layout;
	}

	public function addItems($items){
		$this->items = $items;
	}

	public function show(){
		if ($this->items) {
			foreach ($this->items as $index => $label) {
				$checkbutton = new TCheckButton("{$this->name}[]", $label);
				$checkbutton->setValue($index);
				if (@in_array($index, $this->value)) {
					$checkbutton->setProperty('checked', '1');
				}
				if($this->layout){
					$checkbutton->setLayout($this->layout);
				}
				$checkbutton->show();
			}
		}
	}
}
?>