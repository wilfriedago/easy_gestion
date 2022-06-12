<?php

    include_once('pages/header.inc.php');

    switch ($_REQUEST['pg']) {

        case 'addMember':
            //Connection à la BDD easy_gestion
                require_once('connection.php');

            //On prépare une requête pour compter le nombre d'enregistrement dans la BDD.members
                $nbmember="SELECT COUNT(*) AS nb FROM `members`";

            //On exécute la requête
                $result=mysqli_query($link, $nbmember);

            //On convertir le résultat de la requête sous forme de tableau associatif
                $members=mysqli_fetch_assoc($result);

            //Nombre maximale de membres
                $nbMax = 4;

                include_once('pages/member_add.html');

                    if ($members['nb'] >= $nbMax) { //Si la limite est atteint

                        //Affichage d'un message d'erreur
                        echo <<<'EOT'
                                <section>
                                    <div id="modal-box" class="flex-column member-add" onclick='modalBoxActivity()'>
                                        <div class="flex-column">
                                            <i class="fad fa-times"></i>
                                            <h3>L'ajout à échouer ! <br> La limite  de membre est atteinte</h3>
                                        </div>
                                    </div>
                                </section>
                             EOT;
                    } else { //Si la limite n'est pas atteint

                        //On upload l'image
                        require_once('file_upload.php');

                        //Insertion des informations dans la BDD.members
                        $req= "INSERT INTO members"
                                 ." VALUES(NULL,'".$_REQUEST['nom']
                                 ."','" .$_REQUEST['prenom']
                                 ."','" .$_REQUEST['sexe']
                                 ."','" .$_REQUEST['email']
                                 ."','" .$_REQUEST['contact']
                                 ."','" .$_REQUEST['role']
                                 ."','" .$image_uploader."')";

                        $result=mysqli_query($link, $req);

                        //Affichage d'un message de succès
                        echo <<<'EOT'
                                    <section>
                                        <div id="modal-box" class="flex-column member-add" onclick='modalBoxActivity()'>
                                            <div class="flex-column">
                                                <i class="fad fa-check"></i>
                                                <h3>Nouveau membre ajouté avec succès !</h3>
                                            </div>
                                        </div>
                                    </section>
                                EOT;
                    }
            break;

        case 'addArticle':
            //Connection à la BDD easy_gestion
                require_once('connection.php');

            //On upload l'image
                require_once('file_upload.php');

            //Insertion des informations dans la BDD.products
                $req="INSERT INTO articles"
                    ." VALUES(NULL,'" .$_REQUEST['nom']
                    ."','" .$_REQUEST['libelle']
                    ."','" .$_REQUEST['prix']
                    ."','" .$_REQUEST['quantite']
                    ."','" .$_REQUEST['en_solde']
                    ."','" .$image_uploader."')";

                    $result=mysqli_query($link, $req);

                    include_once('pages/article_add.php');

            //Affichage d'un message de succès, utilisant la syntaxe Nowdoc string quoting
                echo <<<'EOT'
                        <section>
                            <div id="modal-box" class="flex-column member-add" onclick='modalBoxActivity()'>
                                <div class="flex-column">
                                    <i class="fad fa-check"></i>
                                    <h3>Nouvel article ajouté avec succès !</h3>
                                </div>
                            </div>
                        </section>
                    EOT;
            break;
    }

    include_once('pages/footer.inc.html');
