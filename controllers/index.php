<?php

session_start();

$disable = true;
$search_err = $type_err = $empty_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {
        function validate($data)
        {
            $data = trim(stripcslashes(htmlspecialchars($data)));
            return $data;
        }

        $search = validate($_POST['search']);

        if (empty($search)) {
            $empty_err = "<p>*Fill Search Field</p>";
        } if (isset($_SESSION['loginUser']) == false && $search != '') {
            $search_err = "<p>*Must Login First</p>
                            <p>And Don't Play In Inspect Element!</p>";
        } if (!isset($_POST['type']) || $_POST['type'] === '') {
            $type_err = "<p>*Please Select Developer Type</p>";
        } if ($search_err == '' && $type_err == '' && $empty_err == '') {
            //Everything is okey
//            die('OK');
        }
    }
}



require 'views/index.view.php';