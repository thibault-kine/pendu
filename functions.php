<?php
function add_word(string $word, string $filename, string $separator)
{
    $file = fopen($filename, "r+");
    $liste_mots = explode($separator, file_get_contents($filename));
    // retire les espaces du mot
    $word = trim($word, $separator);
    $can_add = true;

    // si le mot existe déjà
    foreach($liste_mots as $k => $v)
    {
        if($v == $word)
        {
            $can_add = false;
            echo "Désolé, ce mot existe déjà";
            break;
        }
    }

    if($can_add)
    {
        // ajoute le mot à la liste
        array_push($liste_mots, $word);
        // met le curseur à la fin
        fseek($file, 0, SEEK_END);
        // ajoute un espace et écrit le mot
        fwrite($file, $separator.$word);
    }
}

function get_words($filename)
{
    return explode("\n", file_get_contents($filename));
}
?>