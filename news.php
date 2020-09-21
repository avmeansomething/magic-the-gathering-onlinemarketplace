<!DOCTYPE html>
<?php $website_title = 'Предпросмотр';?> 
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <?php
    require_once 'include/mysql_connect.php';
    $get_id = $_GET['id_trade'];
    require 'include/head.php';
    ?>
</head>

<body>
    <?php require 'include/header.php';
    ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-4 news_block">
                <div class="news_description">
                    <div class="jumbotron jumbo">
                        <div class="fotorama" data-allowfullscreen="native">
                            <?php $sql = "SELECT * FROM `trades` 
                                        INNER JOIN `users` ON users.id = trades.id_user 
                                        left join trade_photos on trade_photos.id_trade = trades.id_trade where trades.id_trade = $get_id";
                                    $result = mysqli_query($link, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        do {
                                            if($row['img'] != ""){
                                                echo '
                                                    <img src="/diplom_mtg/img/'.$row['img'].'" width="200" alt="">
                                                    ';
                                            }else{
                                                echo '
                                                    <img src="/diplom_mtg/img/'.$row['img'].'" width="200" alt="">
                                                    ';
                                            }
                                        } while ($row = mysqli_fetch_array($result));
                                    }
                                    else{
                                        if(isset($_POST["inputsearch"]))
                                        echo '
                                            <h2>Ваш комментарий будет первым!</h2>
                                        ';
                                    }
                            ?>                 
                        </div>
                    </div>
                    <div class="jumbotron">
                        <?php
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_array($result);
                            echo '
                            <h1>'.$row['type_trade'].': "'.$row['title'].'"</h1>
                            <p><b>Автор статьи: </b><mark>'.$row['login'].'</mark>
                            <button type="button" class="btn btn-link ppver" data-container="body" data-toggle="popover" data-placement="top" data-content="email : '.$row['email'].'       телефон : '.$row['phone'].'">
                                    Связаться
                                 </button></p>
                            <p><b>Время публикации: </b><u>'.$row['create_date'].'</u></p>
                            <p><b>Описание: </b>'.$row['description'].'</p>
                                ';
                        }
                        else{
                            if(isset($_POST["inputsearch"]))
                            echo '
                                <h2>Ваш комментарий будет первым!</h2>
                            ';
                        }
                        ?>
                    </div>
                </div>
                <h3>Комментарии</h3>

                <form action="/diplom_mtg/news.php?id_trade=<?php echo $get_id;?>" method="post">
                    <label for="mess">Сообщение</label>
                    <textarea name="mess" id="mess" class="form-control"></textarea>
                    <button type="submit" id="mess_send" class="btn btn-primary mt-4 mb-5">Добавить комментарий</button>
                </form>
                <?php
                if (isset($_POST['mess'])) {
                    $cookie_id = $_SESSION['logged_user']->id;
                    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                    $link->query("INSERT INTO `comments` (`id_user`,`mess`,`id_trade`,`create_date`)
                       values ('$cookie_id','$mess','$get_id', CURRENT_TIME)");
                    
                }
                ?>
                    <div class='alert alert-info mb-2'>
                <?php
                
                $sql = "select * from comments inner join users on comments.id_user = users.id where id_trade = '.$get_id.'";
                $result = mysqli_query($link, $sql);
                

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo '
                        <h4>'.$row['name'].'</h4>
                        <p>'.$row['create_date'].'</p>
                        <p>'.$row['mess'].'</p>
                            ';
                    } while ($row = mysqli_fetch_array($result));
                }
                else{
                    echo '
                        <h2>Ваш комментарий будет первым!</h2>
                    ';}
                ?>  
            </div>
        </div>
    </div>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    });
</script>
</html>