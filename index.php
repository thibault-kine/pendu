<h1>INDEX.PHP</h1>

<?php
session_start();
include("functions.php");

// ===== ACCESSEURS ===== //
$fn = "mots.txt";
$mots = get_words($fn);

// ===== SETTERS ===== //
if(!isset($_SESSION["mots"]))
{
    $_SESSION["mots"] = $mots;
}
if(!isset($_SESSION["answer"]))
{
    $_SESSION["answer"] = $_SESSION["mots"][rand(0, sizeof($mots)-1)];
}
$str_answer = implode($_SESSION["answer"]);
if(!isset($_SESSION["correct"]))
{
    $_SESSION["correct"] = array();
}

// ===== DEBUG: Montrer le résultat ===== //
var_dump($_SESSION["answer"]);

// ===== SET THE MYSTERY ARRAY ===== //
$mystery = array();
for($i = 0; $i < strlen($str_answer); $i++)
{
    array_push($mystery, " _ ");
}

// ===== HTML ===== //
echo '
<form method="get">
    <label for="guess">Entrez une lettre :</label>
    <input type="text" maxlength="1" name="guess">
    <input type="submit">
</form>
';

// ===== SET THE GUESS VARIABLE ===== //
$_SESSION["guess"] = $_GET["guess"];
var_dump($_SESSION["guess"]);
$letterNb = check($_SESSION["guess"], $_SESSION["answer"], $mystery);

// ===== AFFICHE LE GUESS SUR LA VARIABLE MYSTERY ===== //
// TODO: meme si on met une lettre incorrecte, il l'affiche quand meme et la met a la fin de l'array
$mystery[$letterNb] = $_SESSION["guess"];

echo implode($mystery);
?>