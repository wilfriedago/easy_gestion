<?php

    switch ($_REQUEST['pg']) {

        case 'addMember':

            //Si il y a un fichier à uploader
            if (!empty($_FILES['photo']['name'])) {
                /* Algorithme permettant d'uploader les images sur le serveur */
                $dossier_images = 'assets/images_uploader/members_images/';
                $image_uploader = $dossier_images . basename($_FILES['photo']['name']);

                //On déplace le fichier temporaire qui à servir à stocker l'image, vers le chemin d'accès de l'image uploader
                move_uploaded_file($_FILES['photo']['tmp_name'], $image_uploader);
            } else {
                //Si l'utilisateur n'upload pas de photo, le système lui atribue une photo par défault en fonction de son sexe
                if ($_REQUEST['sexe'] == 1) {
                    $image_uploader = 'assets/images_uploader/members_images/user_female.png';
                } else {
                    $image_uploader = 'assets/images_uploader/members_images/user_male.png';
                }
            }
        break;

        case 'addArticle': //Cas ou on veux ajouter un article
        case 'maj': //Cas ou on effectue une mise à jour

            //Si il y a un fichier à uploader, alors on upload
            if (!empty($_FILES['apercu']['name'])) {
                /* Algorithme permettant d'uploader les images sur le serveur */

                /* Algorithme permettant d'uploader les images sur le serveur */

                $dossier_images = 'assets/images_uploader/articles_images/';
                $image_uploader = $dossier_images . basename($_FILES['apercu']['name']);

                //On déplace le fichier temporaire qui à servir à stocker l'image, vers le chemin d'accès de l'image uploader
                move_uploaded_file($_FILES['apercu']['tmp_name'], $image_uploader);
            } else {

                //image par défault d'un article
                $image_uploader = 'assets/images_uploader/articles_images/article.png';

                //Si il s'agit d'une mise à jour
                if (($_REQUEST['pg']) == 'maj') {
                    require_once('connection.php');

                    //On vérifie si ce produit à déjà une image dans la BDD
                    $req="SELECT apercu FROM articles WHERE id='".$_REQUEST['id']."'";
                    $result=mysqli_query($link, $req);
                    $ligne=mysqli_fetch_assoc($result);

                    if (!empty($ligne['apercu'])) {
                        $image_uploader = $ligne['apercu'];
                    }
                }
            }
        break;
    }
