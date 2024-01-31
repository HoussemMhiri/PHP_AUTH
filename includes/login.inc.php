<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    try {
        include 'dbh.inc.php';
        include 'login_model.inc.php';
        include 'login_contr.inc.php';
        //ERROR HANDLERS
        $errors = [];

        if (isInputEmpty($username, $password)) {
            $errors["emptyInput"] = "Fill in all Fields";
        };

        $result = getUser($conn, $username);
        if (isUsernameInvalid($result)) {
            $errors['login_incorrect'] = 'Incorrect login info!';
        }
        if (!isUsernameInvalid($result) && isPasswordInvalid($password, $result['pwd'])) {
            $errors['login_incorrect'] = 'Incorrect login info!';
        }

        include 'config_session.inc.php';
        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header('Location: ../index.php');
            die();
        }
        $_SESSION['user_id'] = $result["id"];
        $_SESSION['user_username'] = htmlspecialchars($result["username"]);
        header('Location: ../index.php?login=success');
        die();
    } catch (Exception $e) {
        die("Query Failed" . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}
