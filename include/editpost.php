<?php
include('db.php');
require_once 'mysql_connect.php';
$trade_id = $_POST['trade_id'];

$id_user = $_SESSION['logged_user']->id;

$result = $link->query("SELECT * FROM `trades` WHERE id_user = '$id_user' and id_trade = '$trade_id'");
var_dump($result);
var_dump("trade id");
var_dump($trade_id);
var_dump("user id");

var_dump($id_user);
if (mysqli_num_rows($result) > 0) {
    if (isset($_POST['confirm_edit'])) {

        move_uploaded_file($_FILES['file']['tmp_name'], "../img/" . $_FILES['file']['name']);
        echo "The file has just uploaded successfully";
        
        $img = $_FILES['file']['name'];
        if($img != "")
        {
            $link->query("UPDATE `trade_photos` SET `img` = '$img' WHERE id_trade = $trade_id");
        }


        $type = $_POST['edit_type'];
        $title = $_POST['edit_title'];
        $time = $_POST['edit_time'];
        $description = $_POST['edit_description'];

        $link->query("UPDATE `trades` SET `type_trade` = '$type', `title` = '$title', `description` = '$description' WHERE id_trade = $trade_id");
        header("Location: /diplom_mtg/editing.php?id_trade='$trade_id'");
    }
}
else{
    echo "<script>
    if(confirm('Нельзя редачить посты других пользователей, хацкер!)')){
            location.assign('http://localhost/diplom_mtg/');
    }
    </script>";
}
