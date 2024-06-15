<?php
// recupero i dati da json
$fileContent = file_get_contents("dati.json");

// controllo che request ho ricevuto
if (isset($_POST['request'])) {
    // imposto la variabile request con il valore che ricevo
    $_request = $_POST['request'];
}

// se ricevo la request per add
if ($_request == 'add') {
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
        file_put_contents("dati.json", $fileContent);
    }
    // se ricevo la request per update
} elseif ($_request == 'update') {
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
    // se ricevo la request per remove
} elseif ($_request == 'remove') {
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
    // se ricevo la richiesta per delete
} elseif ($_request == 'delete') {
    // converto il file json che ho recuperato sopra e lo faccio diventare un array associativo(php)
    $toDoList = json_decode($fileContent, true);
    // riscrivo come array vuoto
    $toDoList = [];
    // converto l'array in file json
    $fileContent = json_encode($toDoList);
    // scrivo il file su disco
    file_put_contents("dati.json", $fileContent);
}


// imposto l'header
header('Content-Type: application/json');
// stampo
echo $fileContent;
