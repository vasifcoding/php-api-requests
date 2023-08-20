<?php 
require_once 'dbconnect.php';

$data = json_decode(file_get_contents('php://input'),true);
// print_r($_SERVER);
// die();

if(@$_SERVER['HTTP_USERTOKEN']!=123321){
$return_array = array();
$return_array['type'] ='failed'; 
$return_array['message'] ='Yanlis Token'; 
echo json_encode($return_array);
die();
}
// if(@$data['token']!='123321'){
// $return_array = array();
// $return_array['type'] ='failed'; 
// $return_array['message'] ='Yanlis Token'; 
// echo json_encode($return_array);
// die();
// }

$makaleBasligi = $data['makale_basligi'];
$makaleAciklama = $data['makale_aciklama'];
$makaleYazar = $data['makale_yazar'];

$datacek = $db->prepare('INSERT INTO makaleler SET 
makale_basligi=:makale_basligi,
makale_aciklama=:makale_aciklama,
makale_yazar=:makale_yazar

');
$datainsert = $datacek->execute(array(
'makale_basligi'=>$makaleBasligi,
'makale_aciklama'=>$makaleAciklama,
'makale_yazar'=>$makaleYazar
));
if($datainsert){
$return_array = array();
$return_array['type'] ='success'; 
$return_array['message'] ='Veri basariyla eklendi'; 
echo json_encode($return_array);
}
?>