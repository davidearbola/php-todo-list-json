<?php
$filecontent = file_get_contents("dati.json");
header('Content-Type: application/json');
echo $filecontent;
