<?php
$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
if ($login && $password) {
    if (strlen($login) < 3 || strlen($login) > 50) {
        $error_message = 'Логин должен быть от 3 до 50 символов';
    } elseif (strlen($password) < 3 || strlen($password) > 50) {
        $error_message = 'Логин должен быть от 3 до 50 символов';
    } else {
        $user = User::register($login, $password);
        if (!$user) {
            $error_message = 'Пользователь с таким логином уже существует';
        } else {
            $page = 'register_ok';
        }
    }
}