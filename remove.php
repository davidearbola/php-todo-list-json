<?php
// recupero i dati da json
$fileContent = file_get_contents("dati.json");

// controllo di aver ricevuto i dati
if (isset($_POST['indice'])) {
    // converto il file json che ho recuperato sopra e lo faccio diventare un array associativo(php)
    $toDoList = json_decode($fileContent, true);
    // cancello l'elemento dall'array
    array_splice($toDoList, $_POST['indice'], 1);
    // converto l'array in file json
    $fileContent = json_encode($toDoList);
    // scrivo il file su disco
    file_put_contents("dati.json", $fileContent);
}

header('Content-Type: application/json');

echo $fileContent;
