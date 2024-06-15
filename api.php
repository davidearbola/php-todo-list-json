<?php

$students = [
    ['stringa' => 'Organizzare la scrivania', 'done' => false],
    ['stringa' => 'Pianificare i pasti', 'done' => false],
    ['stringa' => 'Fare una chiamata a un amico o un familiare', 'done' => false],
    ['stringa' => 'Scrivere nel diario', 'done' => false],
    ['stringa' => 'Imparare qualcosa di nuovo', 'done' => false],
    ['stringa' => 'Pulire una parte della casa', 'done' => false],
    ['stringa' => 'Meditazione o mindfulness', 'done' => false],
    ['stringa' => 'Aggiornare il curriculum', 'done' => false],
    ['stringa' => 'Fare la spesa', 'done' => false],
    ['stringa' => 'Cucinare una nuova ricetta', 'done' => false],
    ['stringa' => 'Ascoltare un podcast', 'done' => false],
    ['stringa' => 'Scrivere una lettera', 'done' => false],
];

header('Content-Type: application/json');

$jsonString = json_encode($students);

echo $jsonString;
