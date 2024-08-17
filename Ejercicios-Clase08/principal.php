<?php
$user = isset($_POST["user"]) ? $_POST["user"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


$users_list = [
    [
        "user" => "administrador",
        "rol" => 1,
        "password" => "123"
    ],
    [
        "user" => "editor",
        "rol" => 2,
        "password" => "123"
    ],
    [
        "user" => "usuario",
        "rol" => 3,
        "password" => "123"
    ],
];

foreach ($users_list as $list) {
    if ($user == $list['user'] && $password == $list['password']) {
        $hasUser = $list;
        break;
    } else {
        $hasUser = null;
    }
};

if ($hasUser == null) {
    $message = "Usuario o contraseña incorrectos.";
    include_once('app2.php');
} else if ($hasUser['rol'] == 1) {
    include_once('nav1.php');
} else if ($hasUser['rol'] == 2) {
    include_once('nav2.php');
} else if ($hasUser['rol'] == 3) {
    include_once('nav3.php');
}
