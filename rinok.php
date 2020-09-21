<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $website_title = 'Рынок';
    require 'include/head.php';
    require 'include/header.php';
    include('include/mysql_connect.php');
    ?>
</head>

<body>
    <div class="formsearch">
        <form action="" id="search" method="POST">
            <label for="inputsearch">Поиск</label>
            <input name="inputsearch" type="input" class="form-control">
            <input type="submit" value="Поиск" class="btn btn-success" value="Найти">
        </form>
    </div>
    <main class="container mt-5">

        <div class="row">
            <div class="col-md-8 mb-4">
                <?php

                $sql = "select * from trades inner join users on trades.id_user = users.id";

                if (isset($_POST["inputsearch"]) && $_POST["inputsearch"] != "") {
                    $option = $_POST["inputsearch"];
                    $sql = "select * from trades inner join users on trades.id_user = users.id where trades.title like '%$option%' ";
                }




                $result = mysqli_query($link, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo '
                             <div class="adv_info" >
                                 <h2>' . $row["type_trade"] . ' ' . $row["title"] . '</h2>
                                 <b>от </b>
                                 <mark><button type="button" class="btn btn-link ppver" data-container="body" data-toggle="popover" data-placement="top" data-content="email : '.$row['email'].'       телефон : '.$row['phone'].'">
                                 ' . $row["name"] . '
                                 </button></mark>
                                
                                 <p>добавлено ' . $row["create_date"] . '</p>
                                 <a href="/diplom_mtg/news.php?id_trade=' . $row["id_trade"] . '">
                                 <button class="btn btn-warning mb-5">Подробнее</button>
                                </a>
                            </div>
                            ';
                    } while ($row = mysqli_fetch_array($result));
                } else {
                    if (isset($_POST["inputsearch"]))
                        echo '
                        <h2>По вашему запросу ничего не найдено</h2>
                    ';
                    else {
                        echo '
                        <h2>На данный момент нет актульаных предложений</h2>
                        ';
                    }
                }
                ?>
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