<?php
header('Content-Type: application/json; charset=utf-8');
// Dummy login endpoint - accepts POST { "email": "...", "password": "..." }
// This is a mock; integrate with real auth and sessions as needed.
$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';
if ($email === 'test@example.com' && $password === 'password') {
    echo json_encode(['success'=>true,'message'=>'Logged in (dummy)','user'=>['id'=>1,'name'=>'Demo User','email'=>$email]]);
} else {
    http_response_code(401);
    echo json_encode(['success'=>false,'message'=>'Invalid credentials (dummy)']);
}
?>