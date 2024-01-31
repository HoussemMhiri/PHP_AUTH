<?php
include './includes/dbh.inc.php';
include './includes/signup_view.inc.php';
include './includes/config_session.inc.php';
include './includes/login_view.inc.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
</head>

<body>

    <h3><?php outputUsername()  ?></h3>
    <?php
    if (!isset($_SESSION["user_id"])) { ?>
        <h3>Login</h3>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" id="" placeholder="Username">
            <input type="password" name="pwd" id="" placeholder="Password">
            <button>login</button>
        </form>


    <?php } ?>

    <?php
    check_login_errors();
    ?>
    <h3>Signup</h3>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username" id="" placeholder="Username">
        <input type="text" name="email" id="" placeholder="E-Mail">
        <input type="password" name="pwd" id="" placeholder="Password">

        <button>Signup</button>
    </form>

    <?php
    check_signup_errors();
    ?>

    <h3>Logout</h3>
    <form action="includes/logout.inc.php" method="post">

        <button>logout</button>
    </form>
</body>

</html>