<?php

    //Connection à la BDD easy_gestion
        require_once('connection.php');

    //On prépare une requête pour compter le nombre d'enregistrement dans la BDD.products
        $nbmember="SELECT COUNT(*) AS nb FROM articles";

    //On exécute la requête
        $result=mysqli_query($link, $nbmember);

    //On convertir le résultat de la requête sous forme de tableau associatif
        $members=mysqli_fetch_assoc($result);

    if ($members['nb'] == 0) {//Si aucun n'enregistrement n'est encore fait

        //On affiche la page de la liste vide
        echo <<<'EOT'
                <div class="container" id="page5">
                    <section>
                        <a href="index.php?pg=home" class="backBtn flex-row">
                            <i class="fad fa-arrow-circle-left"></i>
                            <h5>Acceuil</h5>
                        </a>
                    </section>
                    <section class="big-title">
                        <h2>Liste des articles</h2>
                    </section>
                    <section class="members-list flex-column">
                        <div class="no-members-msg">
                            <h3>
                                Aucun article <br> n'est dans la liste
                            </h3>
                        </div>
                        <div class="AddMemberBtn">
                            <a href="index.php?pg=article_add"><button>Ajouter un article</button></a>
                        </div>
                    </section>
                </div>
            EOT;
    } else { //Si la BDD contient au moins 1 article

        $req="SELECT * FROM articles";
        $result=mysqli_query($link, $req);

        echo <<<'EOT'
                <div class="container" id="page5">
                    <section>
                        <a href="index.php?pg=home" class="backBtn flex-row">
                            <i class="fad fa-arrow-circle-left"></i>
                            <h5>Acceuil</h5>
                        </a>
                    </section>
                    <section class="big-title">
                        <h2>Liste des articles</h2>
                    </section>
                    <section class="members-list flex-column" id="products-list">
                        <div class="members-table">
                            <form action="index.php" method="POST">
                                <table class="table" id="products-list">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">N°</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Libellé</th>
                                            <th scope="col">Prix</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">En solde ?</th>
                                            <th scope="col">Prix soldé</th>
                                            <th scope="col">Apercu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            EOT;

        while ($ligne = mysqli_fetch_assoc($result)) {
            require('function.php');

            echo '<tr>'
                . "<td><input type='checkbox' name='id[]' value='" . $ligne['id'] . "'></td>"
                . "<th scope='row'>" . $ligne['id'] . "</th>"
                . "<td>" . $ligne['nom'] . "&nbsp;&nbsp;<a href='index.php?pg=edit&id=" . $ligne['id'] . "'><i class='fas fa-edit'></i></a></td>"
                . "<td>" . $ligne['libelle'] . "</td>"
                . "<td>" . $ligne['prix'] . "&nbsp;&nbsp;XOF</td>"
                . "<td>&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp" . $ligne['quantite'] . "</td>"
                . "<td>&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp" . $msg_solde . "</td>"
                . "<td>";
            if ($ligne['en_solde'] == 1) {
                echo $prix_solde.'&nbsp;&nbsp;XOF';
            } else {
                echo '--------------';
            }
            echo "</td>"
                . "<td>" . "<a href='index.php?pg=article_details&id=" . $ligne['id'] . "'id='italic'>Voir ce produit</a></td>"
                . '</tr>';
        }

        echo <<<'EOT'
                                    </tbody>
                                </table>
                        </div>
                        <div class="ActionBtn flex-row">
                            <div class="AddMemberBtn" id="deleteBtn">
                                <input type="submit" value="Supprimer">
                                <input type="hidden" name="pg" value="del">
                            </div>
                        </form>
                        <form action="index.php" method="POST">
                            <div class="AddMemberBtn" id="addBtn">
                                <input type="submit" value="Ajouter un article">
                                <input type="hidden" name="pg" value="article_add">
                            </div>
                        </form>
                    </div>
                        <div class="indications">
                            <h4>Indications</h4>
                                <p>1- &nbsp;Cliquez sur le bouton Ajouter un article, pour ajouter un nouveau produits à la liste.</p>    
                                <p>2- &nbsp;Cochez les cases des produits que vous vouliez supprimés avant d'appuyer sur le bouton Supprimer.</p>                        
                                <p>3- &nbsp;Cliquez sur l'icone d'édition &nbsp;<i class="fas fa-edit"></i>&nbsp; près du nom de l'article pour mettre à jour ses informations.</p>
                                <p>4- &nbsp;Cliquez sur Voir ce produit pour voir les informations détaillées.</p>
                        </div>
                </section>
            </div>
        EOT;
    }
