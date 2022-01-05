<form method="post">
    <label for="ajout">Ajouter un mot :</label>
    <input type="text" name="ajout">
    <input type="submit"><br>
</form>

<?php
include("functions.php");

$mots = [];
$fn = "mots.txt";

if(isset($_POST["ajout"]))
{
    add_word($_POST["ajout"], $fn, "\n");
}
?>