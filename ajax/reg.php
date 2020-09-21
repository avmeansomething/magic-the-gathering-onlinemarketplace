<?php
require("../include/db.php");
?>

<?php


if (isset($_POST['index']))
    header("Location: /diplom_mtg/index.php");


if (isset($_POST['regthrough'])) {
    $errors = array();
    if (trim($_POST['login']) == '')
        $errors[] = 'Введите логин!';

    if (($_POST['pass']) == '')
        $errors[] = 'Введите пароль!';

    if (strlen(($_POST['pass'])) < 8)
        $errors[] = 'Пароль должен содержать минимум 8 символов!';

    if (($_POST['username']) == '')
        $errors[] = 'Введите ваше Имя!';

    if (R::count('users', "login = ?", array($_POST['login'])) > 0) {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }

    if (R::count('users', "email = ?", array($_POST['email'])) > 0) {
        $errors[] = 'Пользователь с такой почтой уже существует!';
    }

    if (empty($errors)) {
        $users = R::dispense('users');
        $users->name = $_POST['username'];
        $users->email = $_POST['email'];
        $users->password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $users->login = $_POST['login'];
        $users->phone = $_POST['phone'];
        R::store($users);
        echo '<script> alert("Регистрация успешная!");</script>';
    } else {
        echo '<script> alert("' . array_shift($errors) . '");</script>';
    }
}

?>