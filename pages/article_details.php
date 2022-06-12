<?php

    require_once('connection.php');
    $req="SELECT * FROM articles WHERE id='".$_REQUEST['id']."'";
    $result=mysqli_query($link, $req);
    $ligne=mysqli_fetch_assoc($result);

    require_once('function.php');

?>

<div class="container" id="page7">
    <section>
        <a href="index.php?pg=articles" class="backBtn flex-row">
            <i class="fad fa-arrow-circle-left"></i>
            <h5>Articles</h5>
        </a>
    </section>
    <section class="big-title">
        <h2>Détails article</h2>
    </section>
    <section class="flex-row a_details">
        <div class="article_details flex-row">
            <div class="article_thumbnails">
                <img src="<?php echo $ligne['apercu']; ?>" alt="photo de l'article">
                <?php if ($ligne['en_solde'] == 1) {
    echo "<span id='reduction'>-".($taux_reduction * 100)."%</span>";
} ?>
            </div>
            <div class="article_detail">
                <?php
                    echo "<h2>".$ligne['nom']."</h2>"
                        ."<h3 id='libelle'>".$ligne['libelle']."</h3>"
                        ."<h3 id='quantite'>Quantité disponible :&nbsp;".$ligne['quantite']."</h3>"
                        ."<div class='flex-row' id='prix_section'>";

                    //Si l'article est en solde on affiche le prix normal, qu'on barre pour ensuite afficher le prix
                    // en solde, et si l'article n'est pas en solde on affiche le justeprix tout court.
                    if ($ligne['en_solde'] == 1) {
                        echo "<h5 id='prix'>";
                        echo $ligne['prix'];
                        echo "&nbsp;XOF</h5>";
                    }
                    echo "<h5 id='prix_solde'>".$prix_solde."&nbsp;XOF</h5>"
                        ."</div>";
                ?>
                <div class="decisionBtn">
                    <button>
                        <h3>Achetez cet article</h3>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
