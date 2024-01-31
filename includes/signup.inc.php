<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    try {
        include 'dbh.inc.php';
        include 'signup_model.inc.php';
        include 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (isInputEmpty($username, $password, $email)) {
            $errors["emptyInput"] = "Fill in all Fields";
        };

        if (isEmailInvalid($email)) {
            $errors["invalidEmail"] = "Invalid Email used";
        }
        if (isUsernameTaken($conn, $username)) {
            $errors["usernameTaken"] = "Username already taken";
        }
        if (isEmailRegistered($conn, $email)) {
            $errors["emailUsed"] = "Email already registered";
        }

        include 'config_session.inc.php';
        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
            header('Location: ../index.php');
            die();
        }
        create_user($conn, $username, $email, $pwd);
        header('Location: ../index.php?signup=success');
        die();
    } catch (Exception $e) {
        die("Query Failed" . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}
