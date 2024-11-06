<?
include __DIR__ . ('/../partials/header.php');
?>
<link rel="stylesheet" href="/public/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<br>
<section>

    <?
    foreach ($section as $item) {
        if ($_SESSION['user']['status'] == 1) {

    ?>
            <div class="section-item" style="background-image: url('<?= $item->getImage() ?>'); background-size: cover; ">
                <div class="overlay"></div>
                <p class="section-heading"><?= $item->getName() ?></p>
                <p><?= $item->getDescription() ?></p>
                <form action="post/add/<?= $item->getName() ?>" method="post">
                    <input type="hidden" value="<?= $_SESSION['user']['login'] ?>" name="login">
                    <input type="hidden" value="<?= $_SESSION['user']['phone'] ?>" name="phone">
                    <input type="hidden" value="<?= $_SESSION['user']['age'] ?>" name="age">
                    <button type="submit">Записаться</button>
                </form>
            </div>
        <?
        } else if ($_SESSION['user']['status'] == 2) {

        ?>
            <div class="section-item" style="background-image: url('<?= $item->getImage() ?>'); background-size: cover; ">
                <p class="section-heading"><?= $item->getName() ?></p>
                <p><?= $item->getDescription() ?></p>
                <br>
                <button class="edit" onclick="location.href='/redsect/<?= $item->getId() ?>'">Редактировать</button>
            </div>
    <?
        }
    }
    ?>
</section>

<?
include __DIR__ . ('/../partials/footer.php');
?>