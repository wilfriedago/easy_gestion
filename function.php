<?php

    //Algorithme de calcule du prix soldé
        //Taux de réduction de 20%
        $taux_reduction = 0.3;

        if ($ligne['en_solde'] == 1) {
            $prix_solde = $ligne['prix'] - ($ligne['prix'] * $taux_reduction);
        } else {
            $prix_solde = $ligne['prix'];
        }

    //Algorithme de formatage de message
        if ($ligne['en_solde'] == 1) {
            $msg_solde = 'Oui';
        } else {
            $msg_solde = 'Non';
        }
