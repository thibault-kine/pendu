<?php
include "header.php";
?>

<p class='warning'>Voulez-vous vraiment supprimer le mot "<?php echo WORDS[$_GET["id"]] ?>" ?</p>

<form method='post'>
    <input type="submit" name="yes" value="OUI">
    <input type="submit" name="no" value="NON">
</form>

<?php
if($_POST["yes"])
{
    $content = file_get_contents('mots.txt');
    $content = str_replace(WORDS[$_GET["id"]], '', $content);
    file_put_contents('mots.txt', $content);

    header("location: admin.php");
}
elseif($_POST["no"])
{
    header("location: admin.php");
}
?>