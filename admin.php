<form method="post">
    <input type="text" name="suggestion">
    <input type="submit">
</form>

<?php
include("functions.php");

$mots = [];
$fn = "mots.txt";

if(isset($_POST["suggestion"]))
{
    add_word($_POST["suggestion"], $fn, "\n");
}

?>