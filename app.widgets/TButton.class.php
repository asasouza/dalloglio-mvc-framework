<?php
class TButton extends TField{
	private $action;
	private $label;
	private $formName;

	public function setAction($action, $label){
		$this->action = $action;
		$this->label = $label;
	}

	public function setFormName($formName){
		$this->formName = $formName;
	}

	public function show(){
		$url = $this->action->serialize();
		$this->tag->name = $this->name;
		$this->tag->type = 'button';
		$this->tag->value = $this->label;

		if (!parent::getEditable()) {
			$this->tag->disabled = "1";
		}

		$this->tag->onclick = "document.{$this->formName}.action='{$url}'; document.{$this->formName}.submit()";

		$this->tag->show();
	}
}

?>