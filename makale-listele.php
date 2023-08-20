<?php 
require_once 'dbconnect.php';
@$id = $_GET['id'];
$makalecek = $db->prepare('SELECT * FROM makaleler WHERE id=:id');
$makalecek->execute(
array(
'id'=>$id
)
);
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