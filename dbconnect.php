<?php 
header('Content-Type:application/json;Charset= Utf-8');
try {
    $user = 'root';
    $pass ='';
    $db = new PDO('mysql:host=localhost;dbname=restapi', $user, $pass);
 
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>