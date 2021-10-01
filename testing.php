<?php
require_once("./phpQuery-onefile.php");

$datas = [];
$i = 130;
$save_file="./download/save_image$i.jpg";

//set URL
$html = file_get_contents("URL");  

//HTMLを全文取得
$dom = phpQuery::newDocument($html);

//imgタグの一覧を取得
foreach ($dom->find('.box')->find('img') as $img){
    $img = $img->getAttribute('src');
    #echo '<img src=' . $img . '><br>';
    $datas[] = $img;
}

foreach ($datas as $img){
    $save_file="./download/save_image$i.jpg";
    $data = file_get_contents($img);
    //特定のディレクトリーにファイルを保存する
    file_put_contents($save_file,$data);
    $i+=1;
}

echo "Complete";

