 <?php
use Firebase\FirebaseLib;

require_once "../vendor/autoload.php";

const FIREBASE_CONFIG = [
    "apiKey"            => "AIzaSyDPnviB-At7qVa38ouzIb49kTGx7Ije9Cs",
    "authDomain"        => "vac-database.firebaseapp.com",
    "databaseURL"       => "https://vac-database.firebaseio.com",
    "projectId"         => "vac-database",
    "storageBucket"     => "",
    "messagingSenderId" => "953976227504",
    "appId"             => "1:953976227504:web:6c191d6e50d29452",
    "databaseSecret"    => "0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn"
];

$firebase = new FirebaseLib(FIREBASE_CONFIG["databaseURL"], FIREBASE_CONFIG["databaseSecret"]);
$result = json_decode($firebase->get("/data"), true);

// idを配列に追加
$returns = [];
foreach ($result as $key => $val) {
//     $val['id'] = $key;
    $returns[] = [
        "id" => $key,
        "title" => $val['title'],
        "description" => $val['description'],
        "url" => str_replace(".aac", ".mp3", $val['url']),
        "user_name" => $val['user_name'],
        "download_count" => $val['download_count'],
    ];
}
$returns = array_reverse($returns);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>humming creators - song creators admin</title>
    <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="nav-header">
            <a class="col-3" href="/list_music.php">HUMMIG CREATORS<br>song creators admin</a>
            <a class="col-2" href="/list_music.php">Hummig一覧</a>
            <a class="col-4" href="javascript:void(0)"></a>
            <a class="col-3" href="javascript:void(0)">まさやさんいらっしゃいませ</a>
        </div>
    </nav>
    <div class="container">
    <?php foreach ($returns as $val): ?>
        <div class="card">
            <div class="card-title">
                <a class="title" href="<?= $val['url'] ?>"><?= $val['title'] ?></a>
                <?= $val['download_count'] ?> DL
            </div>
            <div class="card-body">
                <div class="description"><?= $val['description'] ?></div>
                <div class="user_name"><?= $val['user_name'] ?></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>
