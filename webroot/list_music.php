<?php
// use Firebase\FirebaseLib;

// require_once "../vendor/autoload.php";

// const FIREBASE_CONFIG = [
//     "apiKey"            => "AIzaSyDPnviB-At7qVa38ouzIb49kTGx7Ije9Cs",
//     "authDomain"        => "vac-database.firebaseapp.com",
//     "databaseURL"       => "https://vac-database.firebaseio.com",
//     "projectId"         => "vac-database",
//     "storageBucket"     => "",
//     "messagingSenderId" => "953976227504",
//     "appId"             => "1:953976227504:web:6c191d6e50d29452",
//     "databaseSecret"    => "0f4PktuQmeNIPcxbY6maVIzvxGPL6NMHr81Ik0Fn"
// ];

// $firebase = new FirebaseLib(FIREBASE_CONFIG["databaseURL"], FIREBASE_CONFIG["databaseSecret"]);
// $return = $firebase->get("/music");

$result = [
    [
        "title"          => "ルンルンお風呂でいい気分",
        "description"    => "お風呂にゆっくり浸かっている時に降ってきました。ルンルンな感じです。",
        "tag_name"       => ["鼻歌","ルンルン","サビ"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test1.mp3",
        "user_name"      => "歴史に残るハミングクリエイター",
        "download_count" => 12
    ],
    [
        "title"          => "大草原のオーケストラ",
        "description"    => "ドライブ中に降ってきました。大草原でゆったりしている感じです。オーケストラとかで浸かって欲しいと思います！",
        "tag_name"       => ["鼻歌","ゆったり","大草原","オーケストラ"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test2.mp3",
        "user_name"      => "無名の鼻歌師",
        "download_count" => 3
    ],
    [
        "title"          => "就寝前のハードロック",
        "description"    => "寝る前にベッドで閃いたので弾いてみました。ガンガン系です。ハードロックに使ってください(^^)",
        "tag_name"       => ["エレキギター","アップテンポ","ハードロック"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test3.mp3",
        "user_name"      => "歴史に残るハミングクリエイター",
        "download_count" => 8
    ],
    [
        "title"          => "通勤時間",
        "description"    => "通勤時間のように憂鬱な気分を弾きました。。。",
        "tag_name"       => ["グランドピアノ","憂鬱","暗め"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test4.mp3",
        "user_name"      => "通勤時間大っ嫌いマン",
        "download_count" => 2
    ],
    [
        "title"          => "いつもの日常",
        "description"    => "特に特徴のない、ありふれた音楽ですが、もしよかったらどうぞ",
        "tag_name"       => ["エレキギター","イントロ","キャッチー"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test5.mp3",
        "user_name"      => "無名の鼻歌師",
        "download_count" => 10
    ],
    [
        "title"          => "おしゃれカフェ",
        "description"    => "代官山のおしゃれカフェでかかっていたBGMをイメージしてみました！あっと驚く変化を期待しています!!!",
        "tag_name"       => ["鼻歌","おしゃれカフェ"],
        "url"            => "https://storage.googleapis.com/vac-storage-1/test6.mp3",
        "user_name"      => "歴史に残るハミングクリエイター",
        "download_count" => 8
    ]
];

header("Content-type: application/json; charset=utf-8");
echo json_encode($result);
