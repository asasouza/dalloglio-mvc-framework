<?php

function __autoload($classe){
	if (file_exists("app.ado/{$classe}.class.php")) {
		require_once "app.ado/{$classe}.class.php";
	}
	if (file_exists("app.widgets/{$classe}.class.php")) {
		require_once "app.widgets/{$classe}.class.php";
	}
}

echo '<link rel="stylesheet" type="text/css" href="app.css/bootstrap/css/bootstrap.min.css">';
echo '<script type="text/javascript" src="app.js/jquery.js"></script>';
echo '<script type="text/javascript" src="app.css/bootstrap/js/bootstrap.min.js"></script>';

#TESTA CRITERIA
// $criteria1 = new TCriteria();
// $criteria1->add(new TFilter('sexo', '=', 'F'));
// $criteria1->add(new TFilter('sexo', '=', 'F'));
// $criteria2 = new TCriteria();
// $criteria2->add(new TFilter('sexo', '=', 15));
// $criteria2->add(new TFilter('sexo', '=', 'M'));
// $criteria = new TCriteria();
// $criteria->add($criteria1, TExpression::OR_OPERATOR);
// $criteria->add($criteria2, TExpression::OR_OPERATOR);
// echo $criteria->dump();

#TESTA SQLINSERT
// $sql = new TSqlInsert;
// $sql->setEntity('teste');
// $sql->setRowData('nome', 'Alex Souza');
// $sql->setRowData('nome1', 'Alex Souza');
// $sql->setRowData('nome2', 'Alex Souza');
// $sql->setRowData('nome3', 'Alex Souza');
// echo $sql->getInstruction();

#TESTE SQLUPDATE
// $sql = new TSqlUpdate;
// $sql->setEntity("teste");
// $sql->setRowData("nome", 'Alex Souza');
// $sql->setRowData("nome1", 'Alex Souza');
// $criteria = new TCriteria();
// $criteria->add(new TFilter("id", "=", 11));
// $criteria->add(new TFilter("id", "=", 11));
// $sql->setCriteria($criteria);
// echo $sql->getInstruction();

#TESTE DELETE
// $sql = new TSqlDelete;
// $sql->setEntity("teste");
// $criteria = new TCriteria();
// $criteria->add(new TFilter("id", "=", 11));
// $sql->setCriteria($criteria);
// echo $sql->getInstruction();

// TESTE SELECT
// $sql = new TSqlSelect;
// $sql->addColumn('nome');
// $criteria = new TCriteria();
// $sql->addColumn('email');
// $criteria->add(new TFilter("id", "=", 11));
// $sql->setEntity("teste INNER JOIN teste2");
// // $criteria->setProperty('order', 'nome');
// $criteria->setProperty('limit', '10');
// $criteria->setProperty('offset', '15');
// $sql->setCriteria($criteria);
// echo $sql->getInstruction();

// $sql = new TSqlInsert;
// $sql->setEntity('teste');
// $sql->setRowData('nome', 'Alex Souza');

// try {
// 	$conn = TConnection::getInstance();
// 	$result = $conn->query($sql->getInstruction());
// 	if ($result) {
// 		echo "CRIADO";
// 	}
// } catch (PDOException $e) {
// 	echo $e;
// }

// $sql = new TSqlSelect;
// $sql->setEntity('teste');
// $sql->addColumn('id');
// $sql->addColumn('nome');
// $criteria = new TCriteria();
// $criteria->add(new TFilter("id", "=", 2));
// $sql->setCriteria($criteria);

// try {
// 	$conn = TConnection::getInstance();
// 	$resul = $conn->query($sql->getInstruction());
// 	if ($resul) {
// 		while ($data = $resul->fetch(PDO::FETCH_OBJ)) {
// 			echo $data->id . " " . $data->nome . "<br>";
// 		}
// 	}
// } catch (PDOException $e) {
// 	echo $e;
// }


// TTransaction::open();
// $conn = TTransaction::get();
// TTransaction::rollback();


// TTransaction::open();
// $sql = new TSqlInsert;
// $sql->setEntity('teste');

// $nomes = ["Alex", "Bruno", "José", "Marcos", "Romeu"];
// $conn = TTransaction::get();
// foreach ($nomes as $nome) {
// 	try {
// 		$sql->setRowData('nome', $nome);
// 		$conn->query($sql->getInstruction());
// 		TTransaction::log($sql->getInstruction()); //LOG NÃO ESTA ESCREVENDO
// 	} catch (PDOException $e) {
// 		$conn->rollback();
// 		echo $e;
// 	}
// }

// TTransaction::close();

// TTransaction::open();
// $teste = new TesteRecord;
// $nomes = ["Alex", "Bruno", "José", "Marcos", "Romeu"];
// foreach ($nomes as $nome) {
// 	$teste->nome = $nome;
// 	$teste->store();
// 	echo $teste->load($teste->getLast())->nome;
// }
// TTransaction::close();


// TTransaction::open();
// $teste = new TesteRecord;
// $teste->nome = "Nelsão";
// $teste->store();
// $outro = clone $teste;
// $outro->nome = "Alex";
// $outro->store();
// $teste = new TesteRecord;
// $teste = $teste->load($teste->getLast());
// echo $teste->nome;
// TTransaction::close();

// TTransaction::open();
// $repository = new TRepository('Teste');
// $criteria = new TCriteria;
// $criteria->add(new TFilter('nome', 'LIKE', '%Alex%'));
// $result = $repository->load($criteria);
// // echo $result;
// foreach ($result as $resul) {
// 	echo $resul->nome . "<br>";
// }
// // $result = $repository->delete($criteria);
// $result = $repository->count($criteria);
// echo $result;
// TTransaction::close();

// $html = new TElement("html");
// $html->lang = "pt-br";
// $div = new TElement("div", "col-lg-2");
// $header = new TElement("header", "col-lg-8");
// $h1->add("TESTE");
// $header->add($h1);
// $html->add($div);
// $html->add($header);
// $html->show();

// $image = new TImage("app.files/img.png");
// $image->show();

// $div = new TElement('div', 'table-responsive col-lg-6');
// $table = new TTable;
// $cabecalho = $table->addTHead();
// $cabecalho->addHead('Id');
// $cabecalho->addHead('Nome');
// for ($i=0; $i < 2; $i++) { 
// 	$linha = $table->addRow();
// 	$linha->addCell($i);
// 	$linha->addCell("Alex");
// }
// $div->add($table);
// $div->show();

// function onTeste01($param){
// 	echo "TESTE 01";
// }
// function onTeste02($param){
// 	echo "TESTE 02";
// }
// function onTeste03($param){
// 	echo "TESTE 03";
// }
// echo "<a href='?method=onTeste01'> Teste01 </a><br>";
// echo "<a href='?method=onTeste02'> Teste02 </a><br>";
// echo "<a href='?method=onTeste03'> Teste03 </a><br>";
// $pagina = new TPage;
// $pagina->show();

// class Index extends TPage{
// 	private $table;
// 	private $content;
// 	public function __construct(){
// 		parent::__construct();
// 		$this->table = new TTable;
// 		$thead = $this->table->addTHead();
// 		$action1 = new TAction(array($this, 'onTeste01'));
// 		$action2 = new TAction(array($this, 'onTeste02'));
// 		$action3 = new TAction(array($this, 'onTeste03'));
// 		$link1 = new TElement('a');
// 		$link2 = new TElement('a');
// 		$link3 = new TElement('a');
// 		$link1->href = $action1->serialize();
// 		$link2->href = $action2->serialize();
// 		$link3->href = $action3->serialize();
// 		$link1->add('Teste 01');
// 		$link2->add('Teste 02');
// 		$link3->add('Teste 03');
// 		$thead->addHead($link1);
// 		$thead->addHead($link2);
// 		$thead->addHead($link3);
// 		$this->content = $this->table->addRow();
// 		parent::add($this->table);
// 	}

// 	function onTeste01(){
// 		$texto = "TESTE 01";
// 		$celula = $this->content->addCell($texto);
// 		$celula->colspan = 3;
// 		$celula->addClass("text-center");
// 	}

// 	function onTeste02(){
// 		$texto = "TESTE 02";
// 		$celula = $this->content->addCell($texto);
// 		$celula->colspan = 2;
// 	}

// 	function onTeste03(){
// 		$texto = "TESTE 03";
// 		$celula = $this->content->addCell($texto);
// 		$celula->colspan = 2;
// 	}
// }
// $pagina = new Index;
// $pagina->show();


// $input->show();

// $panel = new TElement('div', "col-lg-6 panel panel-default");

// $panelheader = new TElement('div', "panel-heading");
// $titulo = new TElement("h1", 'text-center');
// $titulo->add("Form");
// $panelheader->add($titulo);

// $panel->add($panelheader);

// $panelbody = new TElement('div', "panel-body");


// $form = new TForm('form');

// //TEntry(Label, Name, Type);
// $text = new TEntry("", "text", "text");
// $password = new TEntry("", "passw", "password");
// $file = new TEntry("", "file", "file");
// $data = new TEntry("", "date", "date");
// $color = new TEntry("", "color", "color");
// $number = new TEntry("", "number", "number");
// $textarea = new TText("", "textarea");
// $combo = new TCombo("Combo", "combo");
// $checkbox = new TCheckButton("teste[]", "checkbox");

// $checkgroup = new TCheckGroup("Selecione as opções","checkgroup");
// $checkgroup->setLayout("checkbox-inline");


// $radiobutton = new TRadioButton("teste[]", "radio");

// $radiogroup = new TRadioGroup("Selecione uma opção", "radiogroup");
// $radiogroup->setLayout("radio-inline");

// $button = new TButton('action1');
// $button->setAction(new TAction('onSend'), "Enviar");
// $button->addClass("btn btn-success btn-md");

// $array;
// for ($i=1; $i < 10; $i++) { 
// 	$array[$i] = "112";
// }
// $combo->addItems($array);

// $checkgroup->addItems($array);
// $radiogroup->addItems($array);

// // $input->setProperty('placeholder', 'Nome');
// // $input->addClass("sr-only");
// // $form->addField($text);
// // $form->addField($password);
// // $form->addField($file);
// // $form->addField($data);
// // $form->addField($color);
// // $form->addField($number);
// // $form->addField($textarea);
// // $form->addField($combo);
// $array = array($text, $password, $file, $data, $color, $number, $textarea, $combo, $checkbox, $checkgroup, $radiobutton, $radiogroup, $button);
// $form->setFields($array);


// // $form->setEditable(FALSE);
// $panelbody->add($form);
// $panel->add($panelbody);
// // $panel->show();
// // $forminput = $form->getField("nome1");
// // $forminput->show();

// $page = new TPage;
// $page->add($panel);
// $page->show();

// function onSend(){
// 	global $form;
// 	$data = $form->getData();
// 	print_r($data);
// }

// class TesteRecord extends TRecord{}

// class TesteForm extends TPage{
// 	private $form;
// 	function __construct(){
// 		$this->form = new TForm("form_teste");
// 		$id = new TEntry("", "id", "text");
// 		$id->addClass("sr-only");
// 		$nome = new TEntry("Nome", "nome", "text");
// 		$button = new TButton("enviar");
// 		$button->setAction(new TAction(array($this, "onSave")), "Salvar");
// 		$button->addClass("btn btn-success");
// 		$button->setFormName("form_teste");
// 		$button2 = new TButton("editar");
// 		$button2->setAction(new TAction(array($this, "onEdit")), "Editar");
// 		$button2->addClass("btn btn-default");
// 		$button2->setFormName("form_teste");
// 		$this->form->addField($nome);
// 		$this->form->addField($button);
// 		$this->form->addField($button2);


// 		parent::add($this->form);
// 	}

// 	function onSave(){
// 		try {
// 			TTransaction::open("teste");
// 			$teste = $this->form->getData("TesteRecord");
// 			$teste->store();
// 			$this->form->setData($teste);
// 			$this->form->setEditable(false);
// 			TTransaction::close();
// 		} catch (Exception $e) {
// 			echo "{$e->getMessage()}";
// 			TTransaction::rollback();
// 		}
// 	}

// 	function onEdit(){
// 		try {
// 			TTransaction::open("teste");
// 			$teste = new TesteRecord(465);
// 			$this->form->setData($teste);
// 			TTransaction::close();
// 		} catch (Exception $e) {
// 			echo $e->getMessage();
// 			TTransaction::rollback();
// 		}
// 	}
// }

// $page = new TesteForm;
// $page->show();


class TesteRecord extends TRecord{}

class TesteList extends TPage{
	private $datagrid;
	private $loaded = false;

	public function __construct(){
		parent::__construct();
		$this->datagrid = new TDataGrid;

		$codigo = new TDataGridColumn("id", "Código");
		$nome = new TDataGridColumn("nome", "Nome");

		$delete = new TDataGridAction(array($this, "onDelete"));
		$delete->setLabel("Delete");
		$delete->setField('id');

		$this->datagrid->addColumn($codigo);
		$this->datagrid->addColumn($nome);
		$this->datagrid->addAction($delete);

		$this->datagrid->createModel();

		parent::add($this->datagrid);
	}

	function onReload(){
		try {
			TTransaction::open("teste");
			$repository = new TRepository('Teste');
			$criteria = new TCriteria;

			$criteria->add(new TFilter("nome", "LIKE", "%Nelsão%"));
			$criteria->setProperty('order', 'id');
			$testes = $repository->load($criteria);
			$this->datagrid->clear();
			foreach ($testes as $teste) {
				$this->datagrid->addItem($teste);
			}
			TTransaction::close();
			$this->loaded = true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}	
	}

	function onDelete($param){
		$key = $param["key"];
		TTransaction::open("teste");
		$teste = new TesteRecord($key);
		$teste->delete();
		TTransaction::close();
		$this->onReload();
	}

	function show(){
		if (!$this->loaded) {
			$this->onReload();
		}
		parent::show();
	}
}

$page = new TesteList;
$page->show();

?>
