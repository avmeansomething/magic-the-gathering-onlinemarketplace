<!DOCTYPE html>
<?php $website_title = 'Редактирование';?> 
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <?php
    require_once 'include/mysql_connect.php';
    $get_id = $_GET['id_trade'];

    $sql = "SELECT * FROM `trades` INNER JOIN `users` ON users.id_user = trades.id_user 
    left join trade_photos on trade_photos.id_trade = trades.id_trade where trades.id_trade = $get_id";

    $result = mysqli_query($link, $sql);  
    require 'include/head.php';
    ?>
</head>

<body>
    <?php require 'include/header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-4 news_block">
                <div class="news_description">
                    <form action="include/editpost.php" method="POST" enctype="multipart/form-data">
                        <div class="editpost">
                            <div class="jumbotron jumbo">
                                <div class="fotorama" data-allowfullscreen="native">
                                <?php $sql = "SELECT * FROM `trades` 
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

                            <div class="box_row_edit">
                                <label class="upload_label" for="file"><img src="/diplom_mtg/img/skrepka.png" width="80" />Изменить фото</label>
                                <input type="file" accept=".png, .jpg, .jpeg" id="file" name="file"><br>
                            </div>
                        </div>
                        <div class="jumbotron">
                        <?php
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_array($result);
                        ?>
                            <p><b>Тип поста<select class="form-control" name="edit_type" id="">
                                    <?php if ($row['type_trade'] == 'Продажа') {
                                        echo '
                                            <option selected value="' . $row['type_trade'] . '">' . $row['type_trade'] . '</option>
                                            <option value="Обмен">Обмен</option>
                                            <option value="Покупка">Покупка</option>
                                            ';
                                    } else if ($row['type_trade'] == 'Обмен') {
                                        echo '
                                            <option selected value="' . $row['type_trade'] . '">' . $row['type_trade'] . '</option>
                                            <option value="Продажа">Продажа</option>
                                            <option value="Покупка">Покупка</option>
                                            ';
                                    } else if ($row['type_trade'] == 'Покупка') {
                                        echo '
                                            <option selected value="' . $row['type_trade'] . '">' . $row['type_trade'] . '</option>
                                            <option value="Продажа">Продажа</option>
                                            <option value="Обмен">Обмен</option>
                                            ';
                                    }
                                    ?>
                                </select></p>
                                <p>Заголовок <input type="text" class="form-control" name="edit_title" value="<?php echo $row['title'] ?>"></b></p>
                                <p><b>Время публикации: </b> <?php echo $row['create_date'] ?></p>
                                <p><b>Описание: </b><input type="text" class="form-control" name="edit_description" value="<?php echo $row['description'] ?>"></p>
                                <input type="submit" name="confirm_edit" class="btn btn-success" value="Изменить" style="margin-left: 40%;">
                                <input type="text" hidden name="trade_id" value="<?php echo $row['id_trade'] ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>