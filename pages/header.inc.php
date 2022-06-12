<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if (isset($_REQUEST['pg'])) {
                switch ($_REQUEST['pg']) {
                    case 'home': echo 'Acceuil';
                        break;
                    case 'members': echo 'Liste des membres';
                        break;
                    case 'member_add': echo 'Ajouter un membre';
                        break;
                    case 'member_details': echo 'Détails membre';
                        break;
                    case 'maj':
                    case 'del':
                    case 'articles': echo 'Liste des articles';
                        break;
                    case 'article_add': echo 'Ajouter un article';
                        break;
                    case 'article_details': echo 'Détails article';
                        break;
                    case 'edit': echo 'Mise à jour des informations';
                        break;
                }
            } else {
                echo 'Acceuil';
            }
        ?>
    </title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="shortcut icon" href="./assets/logo/easygestion_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <nav class="nav flex-row">
            <div class="nav-brand">
                <a href="index.php?pg=home" class="brand-logo">
                    <h1><span>Easy</span>Gestion</h1>
                </a>
            </div>
            <div class="nav-links">
                <ul class="link-list flex-row">
                    <li class="list-item">
                        <a href="index.php?pg=home" class="link">Acceuil</a>
                    </li>
                    <li class="list-item">
                        <a href="index.php?pg=members" class="link">Membres</a>
                    </li>
                    <li class="list-item">
                        <a href="index.php?pg=articles" class="link">Articles</a>
                    </li>
                </ul>
            </div>
            <div class="nav-menuBtn">
            </div>
        </nav>
    </header>
    <!-- /Header Section -->

    <!-- Main Section -->
    <main>