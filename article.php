<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $website_title = 'Добавление';
    require 'include/head.php';
    ?>

    <style>
        .box select {
            background-color: #007bff;
            color: white;
            padding: 15px;
            width: 250px;
            border: none;
            font-size: 20px;
            -webkit-appearance: button;
            appearance: button;
            outline: none;
            transition: all .3s;
        }

        .box select:hover {
            box-shadow: 0 5px 25px rgba(100, 151, 255, 1);
        }

        .box select option {
            background-color: #007bff;
            padding: 30px;
            transition: all .3s;
            height: 30px;
        }
    </style>

</head>

<body>
    <?php require 'include/header.php'; ?>
    <?php require 'include/func.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-4">
                <h4>Добавление</h4>
                <form method="POST" action="/diplom_mtg/include/add_article.php" enctype="multipart/form-data">
                    <label for="title">Название вашего предложения</label>
                    <input type="text" name="title" class="form-control">
                    <br><br>
                    <div class="article_options">
                        <div class="box">
                            <label for="type_trade">Тип предложения</label>
                            <select name="type_trade">
                                <option value="Продажа">Продажа</option>
                                <option value="Покупка">Покупка</option>
                                <option value="Обмен">Обмен</option>
                            </select>
                        </div>
                        <div class="box_row">
                            <label class="upload_label" for="file"><img src="/diplom_mtg/img/skrepka.png" width="80" /></label>
                            <input type="file" accept=".png, .jpg, .jpeg" id="file" name="file"><br>
                        </div>
                    </div>


                    <br><br>

                    <label for="description">Текст статьи</label>
                    <textarea name="description" class="form-control"></textarea>

                    <div id="errorBlock" class="alert alert-danger mt-3" style="display:none"></div>

                    <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle mt-4" data-toggle="dropdown"  aria-expanded="false">
                        Выполнить
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item">Действие 1</a>
                        <a class="dropdown-item">Действие 2</a>
                        <a class="dropdown-item">Действие 3</a>
                    </div>
                </div> -->
                    <button type="submit" name="submit" class="btn btn-primary mt-4">Добавить</button>


                </form>
            </div>

        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $('#article_send').click(function() {
            var title = $('#title').val();
            var intro = $('#intro').val();
            var text = $('#text').val();

            $.ajax({
                type: "POST",
                url: "ajax/add_article.php",
                cache: false,
                data: {
                    'title': title,
                    'intro': intro,
                    'text': text
                },
                dataType: "html",
                success: function(data) {
                    if (data == 'Готово') {
                        $('#article_send').text('Все готово');
                        $('#errorBlock').hide();
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        })
    </script>

</body>

</html>