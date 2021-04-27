<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;
  $response = $PDO->query("SELECT id, password FROM user WHERE nickname = '$username' AND password = '$password'");
  $users =  $response->fetchAll();
  $nbOfUsersWithThisPasswordAndNickname = count($users);
  if ($nbOfUsersWithThisPasswordAndNickname == 1) {
    $connectingUser = $users[0];
    return $connectingUser['id'];
    var_dump($users);
  } else {
    return -1;
  }
}
