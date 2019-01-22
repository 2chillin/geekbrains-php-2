<?php
require_once 'Twig/Autoloader.php';
require_once 'config.php';

Twig_Autoloader::register();

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM images WHERE image_id='$_GET[image_id]'";
$sth = $dbh->query($sql)->fetchObject();

try {
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader);
	$template = $twig->loadTemplate('singlephoto.tmpl');
	echo $template->render(array(
		'title' => 'Картинка #'.$_GET['image_id'],
		'image' => $sth
	));
} catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>
