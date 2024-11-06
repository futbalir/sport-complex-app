<?
include __DIR__ . ('/../partials/header.php');
?>
<link rel="stylesheet" href="/public/css/style.css">



<br>
<p class="rev">Привет! Добро пожаловать на страницу отзывов для приложения спорткомплекса!
   Оставьте свой отзыв ниже и помогите нам улучшить наше приложение.</p>
<main>
   <form action="/posts/add" method="post">
      <input type="text" name="name" placeholder="Имя">
      <input type="email" name="email" placeholder="Почта">
      <input type="phone" name="phone" placeholder="Телефон">
      <textarea name="review" placeholder="Отзыв" style="height: 20%;"></textarea>
      <br>
      <button type="submit">Отправить отзыв</button>
   </form>
</main>

<br>
<?
include __DIR__ . ('/../partials/footer.php');
?>