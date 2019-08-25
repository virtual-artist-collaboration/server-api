<?php
use Google\Cloud\Storage\StorageClient;

require '../vendor/autoload.php';

ini_set( 'display_errors', 1 );

define("DEFAULT_URL","https://vac-database.firebaseio.com/");
define("DEFAULT_TOKEN","0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn");
define("GCS_PROJECTID","vac-storage");
define("GCS_BUCKETID","vac-storage-1");

// print_r($_FILES);

$storage = new StorageClient([
    'projectId' => GCS_PROJECTID,
    'keyFile' => json_decode(file_get_contents('../google.json'), true)
]);

$bucket = $storage->bucket(GCS_BUCKETID);

$options = [
   'name' => basename($_FILES['file']['name'])
];

$object = $bucket->upload(
    fopen($_FILES['file']['tmp_name'], 'r'),
    $options
);

// print_r($object);

$data = array(
  "title" => $_POST["title"],
  "description" => $_POST["description"],
  "user_name" => $_POST["user_name"],
  "url" => 'https://storage.googleapis.com/vac-storage-1/'.basename($_FILES['file']['name']),
  "tag_name" => array(),
  "download_count" => 0
);

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,DEFAULT_TOKEN);

$firebase->set("/data/".uniqid("VACD_"),$data);

header("Content-type: application/json; charset=utf-8");
echo json_encode([
    'status' => 200,
    'data' => json_encode($data)
]);

// $user = $firebase->get("/users");
