<?php

    //var_dump($_REQUEST['id']);
    require_once('connection.php');

    if (isset($_REQUEST['id'])) {
        foreach ($_REQUEST['id'] as $id) {
            $req="DELETE FROM articles WHERE id='" .$id ."'";
            $result=mysqli_query($link, $req);
        }
    } else {
        //Affichage d'un message de warning
        //Aucun article n'a été sélectionner pour la suppression
        echo <<<'EOT'
                <section>
                    <div id="modal-box" class="flex-column failed_delete" onclick='modalBoxActivity()'>
                        <div class="flex-column">
                            <i class="fad fa-exclamation-triangle"></i>
                            <br>
                            <h3> Veuillez choisir un article à supprimer</h3>
                        </div>
                    </div>
                </section>
            EOT;
    }
    include('pages/articles_list.php');
