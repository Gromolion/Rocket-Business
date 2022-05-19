<?php
$conn = include '../db.php';

if (isset($_POST['name']) && isset($_POST['tel'])) {
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    $to  = "<rbru-metrika@yandex.ru>";
    $subject = "Запись на прием";
    $message = "Имя: $name\nТелефон: $tel";

    mail($to, $subject, $message);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
<header class="sticky-top bg-white">
    <div class="container d-flex justify-content-between px-5 py-3">
        <div class="left-side d-flex align-items-center">
            <img src="resources/img/LOGO.svg" alt="Лого">
            <div class="geo px-2">
                <img src="resources/img/geo.svg" alt="Гео-маркер" id="geo-img" class="align-top d-inline-block">
                <div id="geo-text" class="d-inline-block">
                    <span>Ростов-на-Дону</span><br>
                    <span>ул.Ленина, 2Б</span></div>
            </div>
        </div>
        <div class="right-side d-flex align-items-center">
            <span id="tel"><img src="resources/img/whatsapp1.svg" alt="WhatsApp"> +7 (863) 000 00 00</span>
            <button class="appointment" onclick="open_form()">Записаться на прием</button>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container px-5">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="">О клиники</a>
                    </li>
                    <li class="nav-item">
                        <a href="">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a href="">Специалисты</a>
                    </li>
                    <li class="nav-item">
                        <a href="">Цены</a>
                    </li>
                    <li class="nav-item">
                        <a href="">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="info">
    <div class="container d-flex align-items-center px-5">
        <div class="info-text">
            <h1>Многопрофильная клиника для детей
                и взрослых</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
    </div>
</div>
<div class="check-ups container px-5">
    <div class="check-ups-mlayer">
        <?php
        $conn->real_query("SELECT name, include, old_price, price FROM check_ups");
        $check_ups = $conn->use_result();
        foreach ($check_ups as $check_up) {
            $includes = explode(';', $check_up['include']);
            ?>
            <div class="check-up">
                <h2>CHECK-UP</h2>
                <h6><?=$check_up['name']?></h6>
                <ul>
                    <?php
                    foreach ($includes as $include) {
                        ?>
                        <li><span><?=$include?></span></li>
                        <?php
                    }
                    ?>
                </ul>
                <p>Всего <?=$check_up['price']?>₽ <span class="price"><?=$check_up['old_price']?>₽</span></p>
                <div class="btn-wrapper">
                    <button class="appointment" onclick="open_form()">Записаться</button>
                    <button class="more">Подробнее</button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="pagination">
        <button onclick="minusTab()"><img src="resources/img/left.svg" alt=""></button>
        <div class="tabs align-middle mx-5">
            <span id="currentTab">1</span><span id="allTabs">/4</span>
        </div>
        <button onclick="plusTab()"><img src="resources/img/right.svg" alt=""></button>
    </div>
</div>
<footer>
    <div class="container d-flex justify-content-between align-items-center">
        <img src="resources/img/LOGO_white.svg" alt="Логотип">
        <div id="links">
            <a href="">О клинике</a>
            <a href="">Услуги</a>
            <a href="">Специалисты</a>
            <a href="">Цены</a>
            <a href="">Контакты</a>
        </div>
        <div id="messengers">
            <a href=""><img src="resources/img/inst.svg" alt=""></a>
            <a href=""><img src="resources/img/whatsapp2.svg" alt=""></a>
            <a href=""><img src="resources/img/telegram.svg" alt=""></a>
        </div>
    </div>
</footer>
<div id="appointment_form">
    <form action="" method="POST">
        <h1>Записаться на прием</h1>

        <label for="name">Имя</label>
        <input type="text" placeholder="Ваше имя" name="name" required>

        <label for="tel">Телефон</label>
        <input name="tel" placeholder="Ваш номер телефона" type="tel" required>

        <button type="submit" class="btn btn-success">Отправить</button>
        <button type="button" class="btn btn-danger" onclick="close_form()">Закрыть</button>
    </form>
</div>
<script src="resources/js/script.js"></script>
<script src="resources/js/appointment_form.js"></script>
<script type="text/javascript" src="telNumber.js"></script>
</body>
</html>