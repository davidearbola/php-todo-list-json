<?php
// recupero i dati da json
$fileContent = file_get_contents("dati.json");

// controllo di aver ricevuto i dati
if (isset($_POST['stringa']) && isset($_POST['done'])) {
    // cambio $_POST['done'] da stringa a valore booleano
    $booleano = ($_POST['done'] == 'true' ? true : false);
    // converto il file json che ho recuperato sopra e lo faccio diventare un array associativo(php)
    $toDoList = json_decode($fileContent, true);
    // creo un nuovo todo
    $newToDo = ['stringa' => $_POST['stringa'], 'done' => $booleano];
    // pusho il nuovo todo in todolist
    $toDoList[] = $newToDo;
    // converto l'array in file json
    $fileContent = json_encode($toDoList);
    // scrivo il file su disco
    file_put_contents('dati.json', $fileContent);
}

header('Content-Type: application/json');

echo $fileContent;
