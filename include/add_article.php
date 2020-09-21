<?php
include('db.php');
if(isset($_POST['submit']) and $_FILES){
	move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$_FILES['file']['name']);
	echo "The file has just uploaded successfully";
    $img = $_FILES['file']['name'];

    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $type_trade = trim(filter_var($_POST['type_trade'], FILTER_SANITIZE_STRING));
    $description = trim($_POST['description']);

    $error = '';

    if (strlen($title) <= 3) 
        $error = 'Введите название статьи!';
    elseif (strlen($type_trade) <= 5) 
        $error = 'Введите интро статьи!';
    elseif (strlen($description) <= 10) 
        $error = 'Введите текст статьи!';   
    
    if($error != '') {
        echo $error;
        exit();
    }
     
    require_once 'mysql_connect.php';
    

    $cookie_id = $_SESSION['logged_user']->id;
    $t = date('Y-m-d H:i:s');

    $sql = "INSERT INTO trades (type_trade, title, `description`, `id_user`, `create_date`) 
    VALUES ('$type_trade','$title','$description','$cookie_id','$t')";
    $result = mysqli_query($link, $sql);
    

    $sql = "SELECT max(id_trade) as 'ID' FROM trades";
    $result = mysqli_query($link, $sql);
    
    $id_trade = "";
    foreach($result as $res){
        $id_trade = $res['ID'];
    }

    if($img != ""){
        $link->query("INSERT INTO `trade_photos` (`id_trade`,`img`)
    VALUES ('$id_trade','$img')");
    }

    $link->close();

    header('Location: /diplom_mtg/rinok.php');
} else echo "Error!";
