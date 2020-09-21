<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $website_title = 'Авторизация';
    require 'head.php';
    require 'mysql_connect.php';
    ?>

    <style>
        .exit {
            width: 70px;
            height: 20px;
            padding: 8px 40px;
            text-align: center;
            color: #fff;
            border-radius: 5px;
            background-color: #007bff;
            vertical-align: center;
        }
    </style>

</head>

<body>
    <?php require 'header.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <h2>Личный кабинет</h2>
                    <p>Имя: <b><?php echo $_SESSION['logged_user']->name ?></b></p>
                    <p>Логин: <b><?php echo $_SESSION['logged_user']->login ?></b></p>
                    <p>Почта: <b><?php echo $_SESSION['logged_user']->email ?></b></p>
                    <p>Телефон: <b><?php echo $_SESSION['logged_user']->phone ?></b></p>
                    <p>ID: <b><?php echo $_SESSION['logged_user']->id ?></b></p>
                    <!-- <button id="exit_btn" class="btn btn-danger">Выйти</button> -->
                    <a class="exit" href="/diplom_mtg/ajax/exit.php">Выйти</a>
                <?php endif; ?>
            </div>

        </div>
    </main>
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php require 'func.php'; ?>
                <h2>Мои предложения:</h2><br><br>

                <?php 
                $id = $_SESSION['logged_user']->id;
                $sql = "SELECT * FROM trades WHE
                RE id_user = '$id'";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo '
                        <div class="">
                        <h2>'.$row['type_trade'].': "'.$row['title'].'"</h2>
                        <p>добавлено '.$row['create_date'].'</p>
                        <a href="/diplom_mtg/news.php?id_trade='.$row['id_trade'].'">
                        <button class="btn btn-warning mb-5">Прочитать больше</button>
                        </a>
                        <a href="/diplom_mtg/editing.php?id_trade='.$row['id_trade'].'">
                        <button class="btn btn-info mb-5">Редактировать</button>
                        </a>
                        </div>
                    ';
                    } while ($row = mysqli_fetch_array($result));
                }
                else{
                    echo '
                        <h2>У вас нет предложений на текущий момент</h2>
                    ';
                }
                ?>
            </div>

        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $('#auth_user').click(function() {
            var login = $('#login').val();
            var password = $('#password').val();

            $.ajax({
                type: "POST",
                url: "ajax/auth.php",
                cache: false,
                data: {
                    'login': login,
                    'password': password
                },
                dataType: "html",
                // success: function (data) {
                //     if(data == 'Готово') {
                //         $('#auth_user').text('Готово');
                //         $('#errorBlock').hide();
                //         document.location.reload(true);
                //     }
                //     else {
                //         $('#errorBlock').show();
                //         $('#errorBlock').text(data);
                //     }
                // }
            });
        })

        $('#exit_btn').click(function() {
            $.ajax({
                type: "POST",
                url: "ajax/exit.php",
                cache: false,
                data: {},
                dataType: "html",
                success: function(data) {
                    document.location.reload(true);
                    // document.location.href("/");
                }
            });
        })
    </script>

</body>

</html>