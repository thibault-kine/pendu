<?php
include "header.php";
?>

<form method='post'>
    <input type="submit" name="reroll" value="Reroll!">
</form>

<?php
$letters = [
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s",
    "t", "u", "v", "w", "x", "y", "z"
];

if(!isset($motMystere))
{
    // choisis l'id d'un mot au hasard, c'est ce mot qu'on devra deviner
    $randID = random_int(0, sizeof(WORDS) - 1);
    // le mot mystere est choisi en fonction de l'id aléatoire
    $motMystere = WORDS[$randID];
}

// déclare le mot mystere en tant qu'array constante
define("MYSTERE", str_split($motMystere));
var_dump(MYSTERE);

// pour chaque lettre du mot mystere, ajoute et affiche un underscore
$mystere = "";
foreach(MYSTERE as $k => $v)
{
    if($v == "-")
    {
        $mystere .= " - ";
    }
    else
    {
        $mystere .= " _ ";
    }
}
echo $mystere;

// créé une variable qui contiendra les lettres devinées
$guessed = array();

echo "<form method='get' id='letters'>";
foreach($letters as $k => $v)
{
    echo "<input type='submit' value='".$v."' name='choice' class='letter'>";
}
echo "</form>";

if($_POST["reroll"])
{
    header("location: index.php");
}
?>