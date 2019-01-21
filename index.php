<?php
require_once 'Twig/Autoloader.php';
require_once 'config.php';

Twig_Autoloader::register();

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM `images`";
$sth = $dbh->query($sql);

while ($row = $sth->fetchObject()) {
	$images[] = $row;
}

try {
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$template = $twig->loadTemplate('allphoto.tmpl');
		$allpicture = 1;
		echo $template->render(array(
		'title' => 'Все картинки',
		'images' => $images
	));
} catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>
