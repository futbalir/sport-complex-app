<style>
main{
    height: 75%;
    margin-top: 5%;
}
form{
    flex-direction: column;
    
}

</style>
<main>
<form action="/posts/update" method="post">
    <input type="hidden" name="id" value="<?=$user->getId()?>">
    <input type="text" name="login"value="<?=$user->getLogin()?>">
    <input type="text" name="phone"value="<?=$user->getPhone()?>">
    <input type="text" name="age"value="<?=$user->getAge()?>">
    <button type="submit">Изменить</button>
</form>
<form action="/posts/delete" method="post">
    <input type="hidden" name="id"value="<?=$user->getId()?>">
    <button type="submit">Удалить</button>
</form>    
</main>
<?
include __DIR__.('/../partials/footer.php');
?>