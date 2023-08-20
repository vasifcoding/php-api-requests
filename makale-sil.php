<?php 
require_once 'dbconnect.php';
if(@$_SERVER['HTTP_USERTOKEN']!='123321'){
$return_array = array();
$return_array['type']='failed';
$return_array['message']='Yanlis token';

echo json_encode($return_array);
die();
}
@$id = $_GET['id'];
$sorgu = $db->prepare('DELETE FROM makaleler WHERE id=:id');
$sorgu->execute(array('id'=>@$id));
if($sorgu){
$return_array = array();
$return_array['type']='success';
$return_array['message']='Silme islemi basarili';

echo json_encode($return_array);
}
?>