<?php
// ===== FUNCTION add_word(string $word, string $filename, string $separator)
// string $word = the word you want to add to the file
// string $filename = the file's name + extension (ex: "my_file.txt")
// string $separator = the character/string that separates each word in the file
//
// This function opens the file according to $filename, creates an array containing every
// word from the file according to the separator,
// (ex: "my_file.txt" = "tree, sun, plane" 
//  becomes 
//  $array = {
//      0 => "tree",
//      1 => "sun",
//      2 => "plane"
//  };
//  with $separator as ",")
// removes blank spaces from $word and cycles through the file.
//
// RETURN VALUE = void

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

// ===== FUNCTION get_words(string $filename)
// string $filename = the file's name + extension (ex: "my_file.txt")
//
// This function simply returns a string containing a list of the word.
//
// RETURN VALUE = string
function get_words(string $filename)
{
    return explode("\n", file_get_contents($filename));
}

// ===== FUNCTION check(string $guess, array $answer) =====
// string $guess = the letter you check for
// array $answer = an array made from a string containing the word you have to guess
//
// This function cycles trough every character of the $answer array to check if
// there are instances of $guess in $answer.
//
// RETURN VALUE = int

function check(string $guess, array $answer, array $mystery)
{
    for($i = 0; $i < sizeof($mystery); $i++)
    {
        if($guess == $answer[$i])
        {
            return $i;
        }
        else
        {
            break;
        }
    }
}
?>