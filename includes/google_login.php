<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['credential'])) {
    exit;
}

$credential = $data['credential'];

$parts = explode(".", $credential);

$payload = json_decode(
    base64_decode(str_replace(['-', '_'], ['+', '/'], $parts[1])),
    true
);

$_SESSION['google_user'] = [
    'name' => $payload['name'],
    'email' => $payload['email'],
    'picture' => $payload['picture']
];

echo json_encode([
    'status' => 'success'
]);
