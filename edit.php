<?php

include_once('connection.php');
$req    = "SELECT * FROM articles WHERE id='" . $_REQUEST['id'] . "'";
$result = mysqli_query($link, $req);
$ligne  = mysqli_fetch_assoc($result);
include('pages/article_add.php');
