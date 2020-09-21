<!DOCTYPE html>
<html lang="en">
	<head>
		<?php 
    $website_title = 'Регистрация';
	require_once 'db.php';
    require 'head.php'; 
?>


<?php
if (isset($_POST['regthrough'])) {
    $errors = array();
    if (trim($_POST['login']) == '')
        $errors[] = 'Введите логин!';

    if (($_POST['pass']) == '')
        $errors[] = 'Введите пароль!';

    if (strlen(($_POST['pass'])) < 8)
        $errors[] = 'Пароль должен содержать минимум 8 символов!';

    if (($_POST['username']) == '')
        $errors[] = 'Введите ваше Имя!';

    if (R::count('users', "login = ?", array($_POST['login'])) > 0) {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }

    if (R::count('users', "email = ?", array($_POST['email'])) > 0) {
        $errors[] = 'Пользователь с такой почтой уже существует!';
    }

    if (empty($errors)) {
        $users = R::dispense('users');
        $users->name = $_POST['username'];
        $users->email = $_POST['email'];
        $users->password = ($_POST['pass']);
        $users->login = $_POST['login'];
        $users->phone = $_POST['phone'];
        R::store($users);
        echo '<script> alert("Регистрация успешная!");</script>';
    } else {
        echo '<script> alert("' . array_shift($errors) . '");</script>';
    }
}


if (isset($_POST['loginthrough'])) {
    $errors = array();
	$user = R::findOne('users', 'login = ?', array($_POST['login_user']));
    if ($user) {
		if($_POST['password'] == $user->password) {
			$_SESSION['logged_user'] = $user;		
            header("Location: /diplom_mtg/index.php");
        } else {
            $errors[] = 'Вы ввели не верный пароль!';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }
}


if (!empty($errors)) {
    echo '<script> alert("' . array_shift($errors) . '");</script>';
}
?>

</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="">
			<h1>Создать аккаунт</h1>
			<input type="text" id="username" required placeholder="Name" name="username" />
			<input type="email"id="email" required placeholder="Email" name="email" />
			<input type="text" id="login" required placeholder="Login" name="login" />
			<input type="password" id="pass" required placeholder="Password" name="pass" />
			<input type="phone" id="tel" required placeholder="Phone" name="phone" />
			<button id="reg_user" name="regthrough" type="submit">Зарегистрироваться</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" action="">
			<h1>Войти в аккаунт</h1>
			<input type="login" placeholder="Login" name="login_user" />
			<input type="password" placeholder="Password" name="password" />
			<!-- <a href="#">Забыли свой пароль?</a> -->
			<button type="submit" name="loginthrough">Войти</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Добро пожаловать!</h1>
				<p>Чтобы оставаться на связи с нами, пожалуйста, войдите в систему со своей личной информацией</p>
				<button class="ghost" id="signIn">Вход</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Привет, Путник!</h1>
				<p>Введите свои личные данные и начните путешествие вместе с нами</p>
				<button class="ghost" id="signUp">Регистрация</button>
			</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

<script>
    $('#reg_user').click(function () {
        var name = $('#name').val();
        var login = $('#login').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        var phone = $('#phone').val();
        
        $.ajax({
            type: "POST",
            url: "ajax/reg.php",
            cache: false,
            data: {
                'name' : name, 
                'login' : login, 
                'email' : email, 
                'pass' : pass,
                'phone' : phone
            },
            dataType: "html",
            // success: function (data) {
            //     if(data == 'Готово') {
            //         $('#reg_user').text('Все готово');
            //         $('#errorBlock').hide();
            //     }
            //     else {
            //         $('#errorBlock').show();
            //         $('#errorBlock').text(data);
            //     }
            // }
        });
    })
</script>

</body>
</html>
<style> 

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid rgb(255, 42, 60);
	background-color: rgb(255, 42, 60);
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #5e36ff, #341086);
	background: linear-gradient(to right, #5e36ff, #341086);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
</style>