<?php

function isInputEmpty($username, $password)
{
    if (empty($username) ||  empty($password)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameInvalid($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function isPasswordInvalid($pwd, $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}
