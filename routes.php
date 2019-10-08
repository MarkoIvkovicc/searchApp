<?php


$router->define([
    '' => 'controllers/index.php',
    'login' => 'controllers/login.php',
    'register' => 'controllers/register.php',
    'result' => 'controllers/result.php',
    'createUser' => 'controllers/createUser.php',
    'loginUser' => 'controllers/loginUser.php',
    'logout' => 'controllers/logoutUser.php'
]);

//$router->post('/createUser', 'controllers/createUser.php');