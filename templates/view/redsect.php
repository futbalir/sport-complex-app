<style>
main{
    height: 81%;
    margin-top: 5%;
}
form{
    flex-direction: column;
    
}




</style>
<main>
<form action="/admin/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $section->getId() ?>">
    <input type="text" name="name" value="<?= $section->getName() ?>">
    <textarea name="description" style="height: 110px;"><?= $section->getDescription() ?></textarea>
    <input type="file" style="margin-left: 30%;" name="image" value="<?= $section->getImage() ?>">
    <button type="submit">Изменить</button>
</form>
<form action="/admin/delete" method="post">
    <input type="hidden" name="id" value="<?= $section->getId() ?>">
    <button type="submit">Удалить</button>
</form>
</main>
<?
include __DIR__.('/../partials/footer.php');
?>