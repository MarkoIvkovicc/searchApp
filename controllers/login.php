<?php

session_start();

$email_err = $password_err = $empty_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        function validate($data)
        {
            $data = trim( stripcslashes( htmlspecialchars( $data)));
            return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "<p>*Invalid Email Formate</p>";
        } if (!preg_match("/^[A-Za-z0-9]+$/", $password)) {
            $password_err = "<p>*Invalide Password Formate</p>";
        } if (empty($_POST['email']) || empty($_POST['password'])) {
            $empty_err = "<p>*Please Fill All Fields</p>";
        } if ($email_err == '' && $password_err == '' && $empty_err == '') {
            $data = $app['database']->findData([
                'email' => $_POST['email']
            ]);
            $name = $data->name;
            $id = $data->id;

            $userData = $app['database']->selectUser([
                'id' => $id
            ]);

            try {
                if ($app['database']->login('users', [
                        'email' => $_POST['email'],
                        'password' => $_POST['password']
                    ]) == true) {
                    $_SESSION['loginUser'] = true;

                    if ($userData->developerId == null) {
                        $app['database']->insertIds([
                            'column' => 'developerId',
                            'id' => $id
                        ]);
                    } if ($userData->progLangId == null) {
                        $app['database']->insertIds([
                            'column' => 'progLangId',
                            'id' => $id
                        ]);
                    } if ($userData->frameworkId == null) {
                        $app['database']->insertIds([
                            'column' => 'frameworkId',
                            'id' => $id
                        ]);
                    } if ($userData->subFrameworkId == null) {
                        $app['database']->insertIds([
                            'column' => 'subFrameworkId',
                            'id' => $id
                        ]);
                    }



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
        }
    }
}

 require 'views/login.view.php';