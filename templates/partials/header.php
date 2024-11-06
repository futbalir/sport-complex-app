<link rel="stylesheet" href="/public/css/style.css">
<header class="header">
    <?
    if (!$_SESSION['user']) {
    ?>
        <a href="/"><img class="logo" src="/public/images/Логотип.png"></a>
        <a class="button" href="/">Главная</a></li>
        <a class="button" href="/timetable">Расписание</a></li>
        <a class="button" href="/feedback">Отзывы</a></li>
        <a class="button" href="/contacts">Контакты</a></li>
        <div class="user-container">
            <a href="/login" class="login-link">Вход/Регистрация</a></li>
        <?
    } else {
        ?>
            <a href="/"><img class="logo" src="/public/images/Логотип.png"></a>
            <a class="button" href="/">Главная</a></li>
            <a class="button" href="/timetable">Расписание</a></li>
            <a class="button" href="/sections">Секции</a></li>
            <a class="button" href="/feedback">Отзывы</a></li>
            <a class="button" href="/contacts">Контакты</a></li>
            <span class="greeting">Привет</span>
            <a href="/login" class="user-link"> <?= $_SESSION['user']['login'] ?></a>
        </div>
    <?
    }
    ?>
</header>