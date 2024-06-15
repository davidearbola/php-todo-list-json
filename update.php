<?php
// recupero i dati da json
$fileContent = file_get_contents("dati.json");

// controllo di aver ricevuto i dati
if (isset($_POST['indice']) && isset($_POST['done'])) {
    // converto il file json che ho recuperato sopra e lo faccio diventare un array associativo (PHP)
    $toDoList = json_decode($fileContent, true);

    // cambio $_POST['done'] da stringa a valore booleano
    $booleano = ($_POST['done'] == 'true' ? true : false);

    // aggiorno il valore 'done' dell'elemento specificato
    $toDoList[$_POST['indice']]['done'] = $booleano;

    // converto l'array in file json
    $fileContent = json_encode($toDoList);

    // scrivo il file su disco
    file_put_contents("dati.json", $fileContent);
}

header('Content-Type: application/json');

echo $fileContent;
