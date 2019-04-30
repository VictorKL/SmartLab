<!DOCTYPE html>

<?php
$nom = $_GET['recherche_produit'];
?>
<html>

    <head>
        <title>Fiches de sécurité <?php echo $nom; ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/>
    </head>

    <body>

        <header class="page_header">
            <div class="logo_utt">
                <img src="./Images/logo-utt.png" alt="[Logo UTT]"/>
            </div>

            <div class="titre_page">
                <h1>Fiches de sécurité <?php echo $nom; ?></h1>
            </div>
        </header>

        <main class="affichage_produit">
          <div class="affiche_produit">
            <?php
            echo '<h2>'.$nom.'</h2>';
            ?>
            <div class="FS">

                <p id="FS">
                    <?php
                    require "mysql_connect.php";
                    $req_recup_info_produit = "SELECT * FROM produit where designation_francaise = '".$nom."' or designation_anglaise = '".$nom."' or designation_scientifique = '".$nom."' ";
                    //$res_sugestion_produit = mysqli_query($connection,$req_sugestion_produit);
                    $res_recup_info_produit=mysqli_query($connection,$req_recup_info_produit);
                    while($res_recup_info = mysqli_fetch_array($res_recup_info_produit)) {
                        //$picto_secu = 
                        echo "Nom du produit :{$res_recup_info['designation_francaise']}<br />".
                            "Nom en anglais :{$res_recup_info['designation_anglaise']}<br />".
                            "Nom scientifique :{$res_recup_info['designation_scientifique']}<br />".
                            "Formule brute :{$res_recup_info['formule_brute']}<br />".
                            "Quantité :{$res_recup_info['quantite']}<br />".
                            "Commentaire libre :{$res_recup_info['commentaire_libre']}<br />".
                            "Fournisseur :{$res_recup_info['fournisseur']}<br />".
                            "Masse molaire :{$res_recup_info['masse_molaire']}<br />".
                            "Densité :{$res_recup_info['densite']}<br />".
                            "Température de fusion en celsius:{$res_recup_info['temp_fusion_celsius']}<br />".
                            "Température d'ébullition en celsius:{$res_recup_info['temp_ebullition_celsius']}<br />".
                            "Température d'autoflamme en celsius:{$res_recup_info['temp_autoflamme_celsius']}<br />".
                            "Indice optique :{$res_recup_info['indice_optique']}<br />".
                            "Numéro CAS :{$res_recup_info['num_cas']}<br />".
                            "Pictogramme(s) de sécurité :{$res_recup_info['pictogramme_securite']}<br />".
                            "Pictogramme(s) de précaution :{$res_recup_info['pictogramme_precaution']}<br />".
                            "Mélanges dangeureux :{$res_recup_info['temp_autoflamme_celsius']}<br />".
                            "Date de création :{$res_recup_info['date_de_creation']}<br />";
                            break;
                    }
                    ?>
                    
                </p>

            </div>
          </div>
        </main>


    </body>
</html>
