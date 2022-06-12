<?php

    require_once('connection.php');

    require_once('file_upload.php');

    $req=sprintf(
        "UPDATE articles SET nom='%s',libelle='%s',prix='%d',quantite='%d', en_solde='%d',apercu='%s' WHERE id='%d' ",
        $_REQUEST['nom'],
        $_REQUEST['libelle'],
        $_REQUEST['prix'],
        $_REQUEST['quantite'],
        $_REQUEST['en_solde'],
        $image_uploader,
        $_REQUEST['id']
    );

    $result=mysqli_query($link, $req);

    include('pages/articles_list.php');
