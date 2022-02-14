<?php
include "header.php";
?>

<form method="post">
    <label for="newword">Nouveau mot :</label>
    <input type="text" name="newword" id="">
    <input type="submit" name="submit" value="Ajouter">
</form>

<table>
    <thead>
        <tr>
            <th colspan="3">Liste des mots</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>Mot</td>
            <td>Supprimer</td>
        </tr>
        <?php
        foreach(WORDS as $k => $v)
        {
            echo "
            <tr>
                <td>".$k."</td>
                <td>".$v."</td>
                <td><a href='delete.php?id=".$k."'>Supprimer</a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>

<?php
if(!empty($_POST["newword"]))
{
    $filename = "mots.txt";
    $newWord = "\n".$_POST["newword"];
    file_put_contents($filename, $newWord, FILE_APPEND | FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>