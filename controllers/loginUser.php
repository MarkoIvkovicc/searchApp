<?php
session_start();

$name = $app['database']->findName([
    'email' => $_POST['email']
]);

try {
    if ($app['database']->login('users', [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]) == true) {
        $_SESSION['loginUser'] = true;
        echo ("<script LANGUAGE='JavaScript'>
        alert('Welcome {$name}');
        window.location.href='/';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        alert('Error logging you in');
        window.location.href='/login';
        </script>");
    }
} catch (Exception $e) {
    echo $e;
    die();
}




//header('Location: /');
