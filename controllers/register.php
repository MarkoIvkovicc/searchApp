<?php

session_start();

$email_err = $name_err = $password_err = $repassword_err =
$type_err = $progLang_err = $invalidPass = $empty_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        function validate($data)
        {
            $data = trim(stripcslashes(htmlspecialchars($data)));
            return $data;
        }

        $email = validate($_POST['email']);
        $name = validate($_POST['name']);
        $password = validate($_POST['password']);
        $repassword = validate($_POST['re-password']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "<p>*Invalid Email Formate</p>";
        } if (!preg_match("/^[A-Za-z ]+$/", $name)) {
            $name_err = "<p>*Only Big, Small Letters And White Spaces Is Allowed</p>";
        } if (!preg_match("/^[A-Za-z0-9]+$/", $password)) {
            $password_err = "<p>*Only Big, Small Letters And Numbers Is Allowed</p>";
        } if (!preg_match("/^[A-Za-z0-9]+$/", $repassword)) {
            $repassword_err = "<p>*Only Big, Small Letters And Numbers Is Allowed</p>";
        } if ($password != $repassword) {
            $invalidPass = "<p>*Password doesn't match</p>";
        } if (!isset($_POST['type']) || $_POST['type'] === '') {
            $type_err = "<p>*Please Select Developer Type</p>";
        } if (!isset($_POST['progLang']) || $_POST['progLang'] === '') {
            $progLang_err = "<p>*Please Select Programming Language</p>";
        } if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['password']) ||
            empty($_POST['re-password']) || empty($_POST['type']) || empty($_POST['progLang'])) {
                $empty_err = "<p>*Please Fill All Required Fields</p>";
        } if ($email_err == '' && $name_err == '' && $password_err == '' && $repassword_err == '' &&
            $invalidPass == '' && $type_err == '' && $progLang_err == '' && $empty_err == '') {
                $app['database']->newUser('users',[
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => $_POST['password'],
                    'developerId' => null,
                    'progLangId' => null,
                    'frameworkId' => null,
                    'subFrameworkId' => null
                ]);



                $app['database']->newUser('developertype', [
                    'name' => $_POST['type']
                ]);

                $app['database']->newUser('programminglanguage', [
                    'name' => $_POST['progLang']
                ]);

                $app['database']->newUser('framework', [
                    'name' => $_POST['framework']
                ]);

                $app['database']->newUser('subframework', [
                    'name' => $_POST['subFramework']
                ]);

                header('Location: /login');
        }
    }
}

require 'views/register.view.php';