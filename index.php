<?php 
require_once 'dbconnect.php';

$makalecek = $db->prepare('SELECT * FROM makaleler');
$makalecek->execute();
$makaleler = $makalecek->fetchAll(PDO::FETCH_ASSOC);


@$token = $_SERVER['HTTP_USERTOKEN'];

if($token  == '123321'){

$return_array = array();
$return_array['type'] = 'success';
$return_array['count'] = count($makaleler);
$return_array['data'] = $makaleler;

}
else{

$return_array['type'] = 'error';
}


$makale = json_encode($return_array);
echo $makale;
?>