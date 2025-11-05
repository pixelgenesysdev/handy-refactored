<?php
header('Content-Type: application/json; charset=utf-8');
// Dummy user info
$user = ['id'=>1,'name'=>'Demo User','email'=>'test@example.com','role'=>'user'];
echo json_encode(['user'=>$user], JSON_PRETTY_PRINT);
?>