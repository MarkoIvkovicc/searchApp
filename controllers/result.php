<?php

session_start();

if (isset($_SESSION['loginUser']) == true){
    if (isset($_POST['search']) && isset($_POST['type'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit'])) {
                $search = trim(stripcslashes(htmlspecialchars($_POST['search'])));

                $row = $app['database']->search([
                    'search' => $_POST['search'],
                    'type' => $_POST['type']
                ]);

                $frontEnd = $angular = $angularJs = $angular2 = $react = $reactNative = $vue = $backEnd =
                $php = $symfony = $silex = $laravel = $lumen = $nodeJs = $express = $nestJs = 0;
                foreach ($row as $date){
                    switch ($date->typeName) {
                        case 'FrontEnd' : $frontEnd +=1; break;
                        case 'BackEnd' : $backEnd +=1; break;
                    } switch ($date->languageName) {
                        case 'Angular' : $angular +=1; break;
                        case 'React' : $react +=1; break;
                        case 'Vue' : $vue +=1; break;
                        case 'Php' : $php +=1; break;
                        case 'NodeJs' : $nodeJs +=1; break;
                    } switch ($date->frameworkName) {
                        case 'AngularJs' : $angularJs +=1; break;
                        case 'Angular2' : $angular2 +=1; break;
                        case 'ReactNative' : $reactNative +=1; break;
                        case 'Symfony' : $symfony +=1; break;
                        case 'Laravel' : $laravel +=1; break;
                        case 'Express' : $express +=1; break;
                        case 'NestJs' : $nestJs +=1; break;
                    } switch ($date->subframeworkName) {
                        case 'Silex' : $silex +=1; break;
                        case 'Lumen' : $lumen +=1; break;
                    }
                }
            }
        }
    } else {
        die('Incorrect Input From Searching Form');
    }
} else {
    die('You must first login');
}

require 'views/result.view.php';