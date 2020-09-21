<?php 
     require_once 'mysql_connect.php';

     if(mysqli_connect_errno()) {
        echo mysqli_connect_errno();
    }

    function output_data() {

        global $link;
        global $sql;

        if(isset($_POST["inputsearch"]) && $_POST["inputsearch"] != ""){
            $option = $_POST["inputsearch"];

            $sql = "SELECT users.name, trades.type_trade, trades.title, trades.description, trades.create_date, trades.id_trade FROM
            `trades` INNER JOIN `users` ON trades.id_user = users.id_user where trades.title like '%$option%' ORDER BY `create_date` DESC";
            $result = mysqli_query($link, $sql);
        }
        else{
            $sql = "SELECT users.name, trades.type_trade, trades.title, trades.description, trades.create_date, trades.id_trade FROM
            `trades` INNER JOIN `users` ON trades.id_user = users.id_user ORDER BY `create_date` DESC";
            $result = mysqli_query($link, $sql);
        }

        $output_datas = mysqli_fetch_array($result);
        return $result;
    }

    function output_comments() {

        global $link;

        $sql = "SELECT comments.mess, comments.create_date, users.name 
        FROM `users` INNER JOIN `comments` ON users.id_user = comments.id_user ORDER BY `create_date` DESC";
        $result = mysqli_query($link, $sql);

        $comments = mysqli_fetch_all($result);
        return $comments;
    }

    function output_user_data() {

        global $link;
    
        $sql = "SELECT trades.id_trade, trades.type_trade, trades.title, trades.description, trades.create_date FROM
        `trades` WHERE trades.id_user = ".$_SESSION['logged_user']->id_user." ORDER BY `create_date` DESC";

        $result = mysqli_query($link, $sql);
    
        $output_user_datas = mysqli_fetch_all($result);
        return $output_user_datas;
    }

?>