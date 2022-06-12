<?php
    require_once('connection.php');
    $req="SELECT * FROM members WHERE id='".$_REQUEST['id']."'";
    $result=mysqli_query($link, $req);
    $ligne=mysqli_fetch_assoc($result);
?>
<div class="container" id="page4">
    <section>
        <a href="index.php?pg=members" class="backBtn flex-row">
            <i class="fad fa-arrow-circle-left"></i>
            <h5>Membres</h5>
        </a>
    </section>
    <section class="big-title">
        <h2>Détails membre</h2>
    </section>
    <div class="profile flex-row">
        <div class="photo flex-column">
            <div class="thumbnails">
                <img src="<?php echo $ligne['photo']; ?>" alt="photo de moi">
            </div>
        </div>
        <div class="member-details flex-column">
            <div class="basic-information">
                <table class="table">
                    <tbody>
                        <?php
                            //Algorithme de formatage de message
                            if ($ligne['sexe'] == 1) {
                                $sexe = 'Féminin';
                            } else {
                                $sexe = 'Masculin';
                            }

                            echo   "<tr><th>Nom</th><td>".$ligne['nom']."</td></tr>"
                                  ."<tr><th>Prénom</th><td>".$ligne['prenom']."</td></tr>"
                                  ."<tr><th>Sexe</th><td>".$sexe."</td></tr>"
                                  ."<tr><th>Email</th><td>".$ligne['email']."</td></tr>"
                                  ."<tr><th>Contact</th><td>".$ligne['contact']."</td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="roletp-information">
                <h4>Rôle dans le TP</h4>
                <p class="task">
                    <?php
                        echo $ligne['role'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>