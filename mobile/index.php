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
  <header>
    <div class="d-flex py-3">
        <button id="menu-button" onclick="open_menu()">
            <img src="resources/img/open_menu.svg" alt="" id="menu-button-img">
        </button>
        <img id="h-logo" src="resources/img/LOGO.svg" alt="Лого">
        <div id="find">
            <p id="tel">+7 (863) 000 00 00</p>
            <p id="city">Ростов-на-Дону</p>
        </div>
    </div>
  </header>

  <div id="info">
      <img src="resources/img/room.png" alt="">
      <div id="info-text">
          <h1>Многопрофильная клиника для детей
              и взрослых</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
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
    <div class="pagination mt-3">
      <button onclick="minusTab()">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
          </svg>
      </button>
      <div class="tabs align-middle">
        <p id="currentTab">1</p>
          <p id="allTabs">/4</p>
      </div>
      <button onclick="plusTab()">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
          </svg>
      </button>
    </div>
  </div>
  <footer>
      <div class="container">
          <div id="links">
              <a href="">О клинике</a>
              <a href="">Услуги</a>
              <a href="">Специалисты</a>
              <a href="">Цены</a>
              <a href="">Контакты</a>
          </div>
          <div id="messengers">
              <a href=""><img src="resources/img/inst.svg" alt="" width="30" height="30"></a>
              <a href=""><img src="resources/img/whatsapp2.svg" alt="" width="30" height="30"></a>
              <a href=""><img src="resources/img/telegram.svg" alt="" width="30" height="30"></a>
          </div>
      </div>
  </footer>
  <div id="appointment_form">
      <form action="" method="POST">
          <h1>Записаться на прием</h1>

          <label for="name">Имя</label>
          <input type="text" placeholder="Ваше имя" name="name" required>

          <label for="tel">Телефон</label>
          <input type="tel" placeholder="Ваш телефон" name="tel" required>

          <div class="btn-wrapper mt-2">
              <button type="submit" class="btn btn-success">Отправить</button>
              <button type="button" class="btn btn-danger" onclick="close_form()">Закрыть</button>
          </div>
      </form>
  </div>
   <div id="menu">
       <a href="">О клиника</a>
       <a href="">Услуги</a>
       <a href="">Специалисты</a>
       <a href="">Цены</a>
       <a href="">Контакты</a>
       <button id="menu-appointment" onclick="open_form()">Записаться на прием</button>
   </div>
  <script src="resources/js/script.js"></script>
  <script src="resources/js/modal.js"></script>
</body>
</html>