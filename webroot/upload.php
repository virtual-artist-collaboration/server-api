<?php
// use Firebase\FirebaseLib;

// require_once "../vendor/autoload.php";

// const FIREBASE_CONFIG = [
//         "apiKey"            => "AIzaSyDPnviB-At7qVa38ouzIb49kTGx7Ije9Cs",
//         "authDomain"        => "vac-database.firebaseapp.com",
//         "databaseURL"       => "https://vac-database.firebaseio.com",
//         "projectId"         => "vac-database",
//         "storageBucket"     => "",
//         "messagingSenderId" => "953976227504",
//         "appId"             => "1:953976227504:web:6c191d6e50d29452",
//         "databaseSecret"    => "0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn"
//     ];

// $firebase = new FirebaseLib(FIREBASE_CONFIG["databaseURL"], FIREBASE_CONFIG["databaseSecret"]);
// $return = $firebase->get("/music");

<?php
require '../vendor/autoload.php';

define("DEFAULT_URL","https://vac-database.firebaseio.com/");
define("DEFAULT_TOKEN","0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn");
define("GCS_PROJECTID","vac-storage");
define("GCS_BUCKETID","vac-storage-1");

// print_r($_FILES);

$storage = new \Google\Cloud\Storage\StorageClient([
    'projectId' => GCS_PROJECTID,
    'keyFile' => json_decode(file_get_contents('../google.json'), true)
]);

$bucket = $storage->bucket(GCS_BUCKETID);

$options = [
   'name' => basename($_FILES['music']['name'])
];

$object = $bucket->upload(
    fopen($_FILES['music']['tmp_name'], 'r'),
    $options
);

// print_r($object);

$data = array(
  "title" => $_POST["title"],
  "description" => $_POST["description"],
  "user_name" => $_POST["user_name"],
  "url" => $_POST[""],
  "tag_name" => array(),
  "download_count" => 0
);

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);

$firebase->set("/data/".uniqid("VACD_"),$data);

// $user = $firebase->get("/users");
