<?php


function isInputEmpty($username, $pwd, $email)
{
    if (empty($username) || empty($pwd) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


function isUsernameTaken($conn, $username)
{
    if (getUsername($conn, $username)) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistered($conn, $email)
{
    if (getEmail($conn, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user($conn, $username, $email, $pwd)
{
    setUser($conn, $username, $email, $pwd);
}
