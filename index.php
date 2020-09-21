<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    $website_title = 'Главная';
    require 'include/head.php'; 
    require 'include/header.php'; 
 ?>
 <style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        color: #262626;
    }

    section {
        width: 100%;
        height: 100vh;
        box-sizing: border-box;
    }
    section.sec1 {
        background: url(https://images.wallpaperscraft.com/image/dragon_girl_forest_art_96504_1280x1024.jpg) no-repeat center / cover;
        background-attachment: fixed;
    }
    section.sec2 {
        background: url(https://images.wallpaperscraft.com/image/unicorn_water_forest_night_magic_68838_1280x1024.jpg) no-repeat center / cover;
        background-attachment: fixed;
    }
    section.sec3 {
        background: url(https://images.wallpaperscraft.com/image/cliffs_waterfalls_mist_nature_68876_1280x1024.jpg)no-repeat center / cover;
        background-attachment: fixed;
    }
    section.sec4 {
        background: url(https://images.wallpaperscraft.com/image/book_sphere_magic_sorcery_46753_1280x1024.jpg)no-repeat center / cover;
        background-attachment: fixed;
    }
    .sec-text {
        padding: 4% 8%;
        height: auto;
    }
    .sec-text__title {
        margin: 0;
        padding: 0;
        font-size: 2em;
    }
    .sec-text__dsc {
        font-size: 1em;
    }
    .text{
        text-align: center;
        color: white;
        padding-top: 220px;
    }
    .text1{
        text-align: center;
        color: white;
    
    }

    </style>
</head>

<body>

    <section class="sec1">
    <h1 class="text wow animate__animated animate__fadeInLeft "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Добро пожаловть на нашу торговую площадку карт Magic: the Gathering!</h1>
    <h1 class="text1 wow animate__animated animate__fadeInRight "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Зарегистрируйтесь и предложите свои карты другим пользователям.</h1>
    </section>
    
		<!-- <div class="sec-text">
			<h3 class="sec-text__title">Lorem Ipsum is simply dummy text of the</h3>
			<p class="sec-text__dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		</div> -->

<section class="sec2">
<h1 class="text wow animate__animated animate__fadeInLeft "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Для связи с другими пользователями используйте их контактные данные.</h1>
    <h1 class="text1 wow animate__animated animate__fadeInRight "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Если чувствуете неладное - обратитесь к администратору.</h1>
</section>
		<!-- <div class="sec-text">
			<h3 class="sec-text__title">Lorem Ipsum is simply dummy text of the</h3>
			<p class="sec-text__dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		</div> -->

<section class="sec3">
<h1 class="text wow animate__animated animate__fadeInLeft "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Magic: the Gathering является первой Коллекционной Карточной Игрой.</h1>
</section>
		<!-- <div class="sec-text">
			<h3 class="sec-text__title">Lorem Ipsum is simply dummy text of the</h3>
			<p class="sec-text__dsc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		</div> -->

<section class="sec4">
<h1 class="text wow animate__animated animate__fadeInLeft "ata-wow-duration="3.5s" data-wow-offset="120" data-wow-delay=".3s">Не грубите другим людям, если вам что-то не нравится из их предложени, а попытайтесь договориться или вовсе не связывайтесь.</h1>
</section>

<script src="wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>