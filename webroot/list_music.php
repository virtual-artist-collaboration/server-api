<?php
use Firebase\FirebaseLib;

require_once "vendor/autoload.php";

const firebaseConfig = [
    "apiKey"            => "AIzaSyDPnviB-At7qVa38ouzIb49kTGx7Ije9Cs",
    "authDomain"        => "vac-database.firebaseapp.com",
    "databaseURL"       => "https://vac-database.firebaseio.com",
    "projectId"         => "vac-database",
    "storageBucket"     => "",
    "messagingSenderId" => "953976227504",
    "appId"             => "1:953976227504:web:6c191d6e50d29452",
    "databaseSecret"    => "0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn"
];

$firebase = new FirebaseLib(self::firebaseConfig["databaseURL"], self::firebaseConfig["databaseSecret"]);
$return = $firebase->get("/music");

echo json_encode($return);