<?php
require_once 'dbconnect.php';

$data = json_decode(file_get_contents("php://input"), true);

$makale_baslik = $data['makale_baslik'];
$makale_aciklama = $data['makale_aciklama'];
$makale_yazar = $data['makale_yazar'];
@$id = $data['id'];


$token = @$_SERVER['HTTP_USERTOKEN'];
if ($token != '123321') {
    $return_array = array();
    $return_array['type'] = 'failed';
    $return_array['message'] = 'Yanlis Token';
    echo json_encode($return_array);
    die();
}

$makalecek = $db->prepare("UPDATE makaleler SET

makale_basligi=:makale_basligi,
makale_aciklama=:makale_aciklama,
makale_yazar=:makale_yazar
WHERE id={$id}
");
$makalecek->execute(
    array(
        "makale_basligi" => $makale_baslik,
        "makale_aciklama" => $makale_aciklama,
        "makale_yazar" => $makale_yazar
    )
);
$makaleler = $makalecek->fetchAll(PDO::FETCH_ASSOC);


@$token = $_SERVER['HTTP_USERTOKEN'];

if ($token  == '123321') {

    $return_array = array();
    $return_array['type'] = 'success';
    $return_array['message'] = 'Duzenleme islemi basarili';

    
} else {

    $return_array['type'] = 'error';
}
echo json_encode($return_array);

