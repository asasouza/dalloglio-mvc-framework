<?php

function __autoload($classe){
	if (file_exists("app.ado/{$classe}.class.php")) {
		require_once "app.ado/{$classe}.class.php";
	}
	if (file_exists("app.widgets/{$classe}.class.php")) {
		require_once "app.widgets/{$classe}.class.php";
	}
}

echo '<link rel="stylesheet" type="text/css" href="app.public/css/bootstrap.min.css">';
echo '<script type="text/javascript" src="app.public/js/jquery.js"></script>';
echo '<script type="text/javascript" src="app.public/js/bootstrap.min.js"></script>';



$nav = new Element("nav", "navbar navbar-inverse");

	$container = new Element("div", "container-fluid");

		$nav_header = new Element("div", "navbar-header");
			$button = new Element("button", "navbar-toggle");
			$button->data_toggle = "collapse";
			$button->data_target = "#myNavbar";
			$button->add(new Element("span", "icon-bar"));
			$button->add(new Element("span", "icon-bar"));
			$button->add(new Element("span", "icon-bar"));

			$a = new Element("a", "navbar-brand");
			$a->href = "#";
			$a->add("Teste");
		$nav_header->add($button);
		$nav_header->add($a);

		$nav_collapse = new Element("div", "collapse navbar-collapse");
		$nav_collapse->id = "myNavbar";
			$nav_ul = new Element("ul", "nav navbar-nav");
				$li = new Element("li");
					$a = new Element("a");
					$a->add("TESTE");
					$a->href = "#";
				$li->add($a);
			$nav_ul->add($li);
		$nav_collapse->add($nav_ul);

	$container->add($nav_header);
	$container->add($nav_collapse);
$nav->add($container);

$nav->show();


?>