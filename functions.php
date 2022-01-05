<?php
function add_word(string $word, string $filename, string $separator)
{
    $file = fopen($filename, "r+");
    $liste_mots = explode($separator, file_get_contents($filename));
    // retire les espaces du mot
    $word = trim($word, $separator);

    // si le mot existe déjà
    if(in_array($word, $liste_mots))
    {
        echo "Désolé, ce mot existe déjà";
    }
    else
    {
        // ajoute le mot à la liste
        array_push($liste_mots, $word);
        // met le curseur à la fin
        fseek($file, 0, SEEK_END);
        // ajoute un espace et écrit le mot
        fwrite($file, $separator.$word);
    }

    var_dump($liste_mots);
}

function remove_word(string $word, string $filename, string $separator)
{
    $file = fopen($filename, "r+");
    $liste_mots = explode($separator, file_get_contents($filename));
    // retire les espaces du mot
    $word = trim($word);

    // si le mot existe
    if(in_array($word, $liste_mots))
    {
        foreach($liste_mots as $k => $v)
        {
            if($v == $word)
            {
                unset($liste_mots[$k]);
            }
        }
    }
    else
    {
        echo "Désolé, ce mot n'existe pas.";
    }

    var_dump($liste_mots);
}
?>