<h1>ADMIN.PHP</h1>

<form method="post">
    <label for="ajout">Ajouter un mot :</label>
    <input type="text" name="ajout">
    <input type="submit"><br>
</form>

<?php
session_start();
include("functions.php");

$fn = "mots.txt";
$mots = get_words($fn);

if(!isset($_SESSION["mots"]))
{
    $_SESSION["mots"] = $mots;
}

if(isset($_POST["ajout"]))
{
    add_word($_POST["ajout"], $fn, "\n");
}

var_dump($_SESSION["mots"]);
?>