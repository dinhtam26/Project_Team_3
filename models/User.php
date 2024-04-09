<?php
function getAllUser()
{
    $sql = "SELECT * FROM `user`";
    $listUser = listRecord($sql);
    return $listUser;
}

function getAllEmailUser()
{
    $sql = "SELECT `email` FROM `user`";
    $listAllEmail   = listRecord($sql);
    return $listAllEmail;
}

function getUserByID($id)
{
    $sql = "SELECT * FROM `user` WHERE id= '$id'";
    $itemUser = singleRecord($sql);
    return $itemUser;
}

function getUserClientByEmailAndPassword($email, $password)
{
    $sql = "SELECT * FROM `user` AS `u` WHERE `u`.email = '$email' AND `u`.password = '$password' ";
    $user = singleRecord($sql);
    return $user;
}
