<?
include __DIR__ . ('/../partials/header.php');
?>
<main>
    <link rel="stylesheet" href="/public/css/style.css">
    <br>
    <? session_start();
    if (!$_SESSION['user']) {
    ?>

        <h2 class="reg">Регистрация</h2>
        <form action="/login/reg" method="post">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="confirm" placeholder="Повторите пароль" required>
            <input type="tel" name="phone" placeholder="Телефон" required>
            <input type="text" name="age" placeholder="Возраст" required>
            <button class="butt" type="submit">Зарегистрироваться</button>
        </form>
        <br>
        <h2 class="reg">Авторизация</h2>
        <form action="/login/auth" method="post">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button class="but" type="submit">Войти</button>
        </form>
    <?
    } else if ($_SESSION['user']['status'] == '1') {
    ?>
        <main style="height:52%">
        <p class="biba">Вы вошли как пользователь <?= $_SESSION['user']['login'] ?></p>
        <form action="/login/logout" method="post">
            <button type="submit" style="left: 60%;">Выйти</button>
        </form>
        </main>
    <?
    }
    if ($_SESSION['user']['status'] == '2') {
    ?>

        <p class="biba">Вы вошли как величайший <?= $_SESSION['user']['login'] ?></p>
        <form action="/login/logout" method="post" style="margin-top:auto; margin-bottom:2%">
            <button type="submit" style=" margin-left: 47%; line-height:1; ">Выйти</button>
        </form>

        <div class="container">
            <table style="flex:1;">
                <thead>
                    <tr>
                        <th>Логин</th>
                        <th>Телефон</th>
                        <th>Возраст</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $item) { ?>
                        <tr>
                            <td><?= $item->getLogin() ?></td>
                            <td><?= $item->getPhone() ?></td>
                            <td><?= $item->getAge() ?></td>
                            <td><button onclick="location.href='/redact/<?= $item->getId() ?>'">Изменить</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="/admin/add" method="post" style="margin-left: 1%; flex:1;" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Название секции">
                <textarea name="description" placeholder="Описание секции" style="height: 30%;"></textarea>
                <input type="file" name="image" placeholder="Картинка секции" style="margin-left:30%; color:black">
                <br>
                <br>
                <button type="submit">Добавить</button>
            </form>
        </div>
    <?
    }
    ?>
    <br>
</main>
<?
include __DIR__ . ('/../partials/footer.php');
?>