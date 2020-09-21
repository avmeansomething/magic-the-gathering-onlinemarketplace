<?php 
    $search = trim(filter_var($_POST['inputsearch'], FILTER_SANITIZE_STRING));
    echo $search;

    require_once './mysql_connect.php';
    
    $link = mysqli_connect('localhost', 'root','','testing'); 
    $result = $link->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'") ; 
