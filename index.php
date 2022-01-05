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

if(!isset($_SESSION["answer"]))
{
    $_SESSION["answer"] = $_SESSION["mots"][rand(0, sizeof($mots)-1)];
}

var_dump($_SESSION["answer"]);
$mystery = array();

for($i = 0; $i < strlen($_SESSION["answer"]); $i++)
{
    array_push($mystery, " _ ");
}

$mystery_str = implode($mystery);
var_dump($mystery_str);
echo $mystery_str;
?>

<form method="get">
    <label for="guess">Entrez une lettre :</label>
    <input type="text" maxlength="1" name="guess">
    <input type="submit">
</form>

<?php
foreach($_SESSION["answer"] as $key => $val)
{
    if($_POST["guess"] == $val)
    {
        $mystery_str[$key] = $_POST["guess"];
    }
    else
    {
        echo "Faux !";
    }
}
?>