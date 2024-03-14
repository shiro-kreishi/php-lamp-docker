<?php
session_start();
//$back = '/web/2 семестр/sqlhelp/';
$back = '/db-helper/';
if ($_POST['log_in'])
	if (($_POST['login'] == 'admin') && ($_POST['password'] == 'admin')) {
		$_SESSION['vhod']['admin'] = 1;
		$_SESSION['user'] = 'admin';
		header('Location: '.$back);
	} else if (($_POST['login'] == 'user1') && ($_POST['password'] == 'user1')){
		$_SESSION['vhod']['user1'] = 1;
		$_SESSION['user'] = 'user1';
		header('Location: '.$back);
	} else if (($_POST['login'] == 'user2') && ($_POST['password'] == 'user2')){
		$_SESSION['vhod']['user2'] = 1;
		$_SESSION['user'] = 'user2';
		header('Location: '.$back);
	} else
		header('Location: '.$back);
if ($_POST['vyhod']) {
	$_SESSION = array();
	header('Location: '.$back);
}
if ($_POST['save']) {
	//$name = prompt('Введите имя сохранения',10);
	$_SESSION['savestolb'][$_POST['save']] = $_SESSION['actualstolb'] = $_POST['stolb'];
	$_SESSION['savestr'][$_POST['save']] = $_SESSION['actualstr'] = $_POST['str'];
	$_SESSION['saveraz'][$_POST['save']] = $_SESSION['actualraz'] = $_POST['raz'];
	header('Location: '.$back);
}
if ($_POST['load']) {
	//$name = prompt('Введите имя сохранения',10);
	$_SESSION['actualstolb'] = $_SESSION['savestolb'][$_POST['load']];
	$_SESSION['actualstr'] = $_SESSION['savestr'][$_POST['load']];
	$_SESSION['actualraz'] = $_SESSION['saveraz'][$_POST['load']];
	header('Location: '.$back);
}
if ($_POST['startopt'] == 1) {
	$_SESSION['actualstolb'] = $_POST['stolb'];
	$_SESSION['actualstr'] = $_POST['str'];
	$_SESSION['actualraz'] = $_POST['raz'];
	header('Location: '.$back);
}
?>
