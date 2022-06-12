
<div class="container" id="page6">
    <section>
        <a href="index.php?pg=articles" class="backBtn flex-row">
            <i class="fad fa-arrow-circle-left"></i>
            <h5>Articles</h5>
        </a>
    </section>
    <section class="big-title">
        <h2>Ajouter un article</h2>
    </section>
    <section class="form flex-row">
        <div class="form-area-border" id="articleAdd">
            <form action="index.php" method="POST" class="inscription-form flex-column" enctype="multipart/form-data">
                <h5>
                    Veuillez entrer les informations du <br> nouvel article.
                </h5>
                <div class="form-area flex-column">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?php if (isset($ligne)) {
    echo $ligne['nom'];
} ?>"placeholder="Taper \' pour insérez une apostrophe !" required>
                </div>
                <div class="form-area flex-column">
                    <label for="libelle">Libellé de l'article</label>
                    <input type="text" name="libelle" id="libelle" value="<?php if (isset($ligne)) {
    echo $ligne['libelle'];
} ?>" >
                </div>
                <div class="form-area flex-column">
                    <label for="prix">Prix</label>
                    <input type="number" min="0" name="prix" id="prix" value="<?php if (isset($ligne)) {
    echo $ligne['prix'];
} ?>" required>
                </div>
                <div class="form-area flex-column">
                    <label for="quantite">Quantité</label>
                    <input type="number" min="0" name="quantite" id="quantite" value="<?php if (isset($ligne)) {
    echo $ligne['quantite'];
} ?>">
                </div>
                <div class="form-area flex-column">
                    <label for="en_solde">En solde ?</label>
                   <div class="radioBtn flex-row">
                       <input type="radio" name="en_solde" value="1" <?php if (isset($ligne) && $ligne['en_solde'] !=0) {
    echo 'checked';
} ?> ><h5>Oui</h5>

                       <input type="radio" name="en_solde" value="0"
                           <?php  switch ($_REQUEST['pg']) {
                               //Par défault à l'ajout d'un article celui ci n'est pas en solde
                                    case 'article_add': echo 'checked';
                                        break;
                               //Si l'on veux effectuer une mis à jour, on actualise l'affichage en fonction du choix initial, depuis la BDD.products
                                    case 'edit': if (isset($ligne) && $ligne['en_solde'] ==0) {
                                        echo 'checked';
                                    }
                                        break;
                                    } ?> ><h5>Non</h5>
                   </div>
                </div>
                <div class="form-area flex-column">
                    <label for="apercu">Uploader un apercu de l'article</label>
                    <input type="file" name="apercu" id="apercu" accept="image/*" value="<?php if (isset($ligne)) {
                                        echo $ligne['apercu'];
                                    } ?>">
                </div>
                <input type="hidden" name="pg" value="<?php if (!isset($ligne)) {
                                        echo 'addArticle';
                                    } else {
                                        echo 'maj';
                                    } ?>">
                <?php
                    if (isset($ligne)) {
                        echo "<input type='hidden' name='id' value='" .$ligne['id'] ."'>";
                    }
                ?>
                <button type="submit"><?php if (!isset($ligne)) {
                    echo 'Ajouter';
                } else {
                    echo 'Mettre à jour';
                } ?></button>
            </form>
        </div>
    </section>
</div>
