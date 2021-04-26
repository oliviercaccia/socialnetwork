<?php

//$action = $_GET["action"] ?? "display";
/*$action = "display";
if (isset($_GET["action"])) {
  $action = $_GET["action"];
}*/
$action = isset($_GET["action"]) ? $_GET["action"] : "display";

switch ($action) {

  case 'register':
    // code...
    break;

  case 'logout':
    // code...
    break;

  case 'login':
    // code...
    break;

  case 'newMsg':
    // code...
    break;

  case 'newComment':
    // code...
    break;

  case 'display':
  default:
    include "../models/PostManager.php";
    $posts = GetAllPosts();

    include "../models/CommentManager.php";
    $comments = array();

    foreach ($posts as $onePosts) {
      $comments[$onePosts['id']] =  GetAllCommentsFromPostId($onePosts['id']);
    };
    // ===================HARDCODED PART===========================
    // format idPost => array of comments
    // $comments[1] = array(
    //   array("nickname" => "FakeUser1", "created_at" => "1970-01-01 00:00:00", "content" => "Fake comment 01."),
    //   array("nickname" => "FakeUser2", "created_at" => "1970-01-02 00:00:00", "content" => "Fake comment 02."),
    //   array("nickname" => "FakeUser1", "created_at" => "1970-01-03 00:00:00", "content" => "Fake comment 03.")
    // );
    // $comments[3] = array(
    //   array("nickname" => "FakeUser1", "created_at" => "1970-01-01 00:00:00", "content" => "Fake comment 04."),
    // );
    // =============================================================

    include "../views/DisplayPosts.php";
    break;
}
