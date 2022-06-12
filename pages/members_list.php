<?php

    //Connection à la BDD easy_gestion
        require_once('connection.php');

    //On prépare une requête pour compter le nombre d'enregistrement dans la BDD.members
        $nbmember="SELECT COUNT(*) AS nb FROM `members`";

    //On exécute la requête
        $result=mysqli_query($link, $nbmember);

    //On convertir le résultat de la requête sous forme de tableau associatif
        $members=mysqli_fetch_assoc($result);

    if ($members['nb'] == 0) {//Si aucun n'enregistrement n'est encore fait

        //On affiche la page de la liste vide
        echo <<<'EOT'
                <div class="container" id="page2">
                    <section>
                        <a href="index.php?pg=home" class="backBtn flex-row">
                            <i class="fad fa-arrow-circle-left"></i>
                            <h5>Acceuil</h5>
                        </a>
                    </section>
                    <section class="big-title">
                        <h2>Membres du groupe</h2>
                    </section>
                    <section class="members-list flex-column">
                        <div class="no-members-msg">
                            <h3>
                                Aucun membre <br> n'appartient au groupe
                            </h3>
                        </div>
                        <div class="AddMemberBtn">
                            <a href="index.php?pg=member_add"><button>Ajouter un membre</button></a>
                        </div>
                    </section>
                </div>
                EOT;
    } else { //Si la BDD contient au moins 1 membre

        echo <<<'EOT'
                <div class="container" id="page4">
                    <section>
                        <a href="index.php?pg=home" class="backBtn flex-row">
                            <i class="fad fa-arrow-circle-left"></i>
                            <h5>Acceuil</h5>
                        </a>
                    </section>
                    <section class="big-title">
                        <h2>Membres du groupe</h2>
                    </section>
                    <section class="members-list flex-column">
                        <div class="members-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom(s)</th>
                                        <th scope="col">Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                EOT;

        $req = 'SELECT * FROM `members`';
        $result = mysqli_query($link, $req);
        while ($ligne=mysqli_fetch_assoc($result)) {
            echo '<tr>'
            .'<td>'.$ligne['id'].'</td>'
            ."<td><a href='index.php?pg=member_details&id=".$ligne['id']."'>".$ligne['nom']."</a></td>"
            .'<td>'.$ligne['prenom'].'</td>'
            .'<td>'.$ligne['contact'].'</td>'
            .'</tr>';
        }
        echo <<<'EOT'
                                </tbody>
                            </table>
                        </div>
                        <div class="AddMemberBtn">
                            <a href="index.php?pg=member_add"><button>Ajouter un membre</button></a>
                        </div>
                </section>
            </div>
       EOT;
    }
