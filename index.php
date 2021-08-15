<?php
require_once("includes.php");
session_start();
if (isset($_REQUEST['method'])) {
	$page = $_REQUEST['method'];
} else {
	$page = 'index';
}
$user = null;

$page = preg_replace('/[^a-z0-9_]+/', '', $page);

if (isset($_SESSION['uid'])) {
    $user = User::get($_SESSION['uid']);
}

if ($page == 'login') {
    $login = $_REQUEST['login'] ?? false;
    $password = $_REQUEST['password'] ?? false;
    if (!$login || !$password) {
        $error_message = 'Вы не ввели данные для авторизации';
    } else {
        $user = User::login($login, $password);
        if (!$user) {
            $error_message = 'Неверный логин или пароль';
        }
    }
    if ($user) {
        $page = 'lk';
    } else {
        $page = 'index';
    }
}
if (!file_exists("pages/{$page}.php")) {
    header('HTTP/1.0 404 not found');
    exit();
}
$page_no_login = ['index', 'login', 'register'];
if (!$user && !in_array($page, $page_no_login)) {
    $page = 'index';
}
$error = false;
$data = [];
include "pages/{$page}.php";

if (file_exists("templ/{$page}.php")) {
    include "templ/main.php";
} else {
    header('HTTP/1.0 404 not found');
}