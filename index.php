<h1>INDEX.PHP</h1>

<?php
session_start();
include("functions.php");

$fn = "mots.txt";
$mots = get_words($fn);

if(!isset($_SESSION["mots"]))
{
    $_SESSION["mots"] = $mots;
}

$rand_word = $_SESSION["mots"][rand(0, sizeof($mots)-1)];
var_dump($rand_word);

for($i = 0; $i < strlen($rand_word); $i++)
{
    echo "_ ";
}
?>

<form method="post">
    <label for="input">Entrez une lettre :</label>
    <input type="text" maxlength="1" name="input">
    <input type="submit">
</form>