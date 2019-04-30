<!DOCTYPE html>
<html>

    <head>
        <title>Fiches de sécurité</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/> 
    </head>

    <body>

        <header class="page_header">
            <div class="logo_utt">
                <img src="./Images/logo-utt.png" alt="[Logo UTT]"/>
            </div>

            <div class="titre_page">
                <h1>Fiches de sécurité</h1>
            </div>
        </header>

        <main class="index">
            
            <form method="get" action="fiche_simplifiée.php" class="recherche">
                <input type="text" name="recherche_produit" placeholder="Nom du produit..." list="nom_produit">
                <datalist id="nom_produit">
                    <?php
                    require "mysql_connect.php";
                     
                    $req_sugestion_produit = "SELECT `designation_francaise`, `designation_anglaise`, `designation_scientifique` FROM produit ";
                     
                    $res_sugestion=mysqli_query($connection,$req_sugestion_produit);
                    $res_sugestion_produit = mysqli_fetch_all($res_sugestion);
                    foreach ($res_sugestion_produit as $res)
                    {
                        foreach ($res as $re)
                        echo '<option value="'.$re.'">';
                    }
                    ?>
                </datalist>
                <input type="submit" value="Rechercher un produit">
            </form>
            
            <form methode="GET" action="#" class="scan">
                <img src="./Images/scan.png" alt="[Scan]" class="logo_scan"/>
                <input type="submit" value="Scanner un produit">
            </form>

            <div class="produits">
                <a>Liste des produits récemment utilisés :</a>
                <ul class="liste_produit"><?php /*A REMPLIR AVEC LA BASE DE DONNEE*/ ?>
                    <a href="http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit=Chloroforme"><li>Chloroforme</li></a>
                    <a href="http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit=Trichloréthylène"><li>Trichloréthylène</li></a>
                    <a href="http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit=Acetonitrile"><li>Acetonitrile</li></a>
                    <a href="http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit=Sodium_dodecyl_sulfate"><li>Sodium dodecyl sulfate</li></a>
                    <a href="http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit=Peroxyde_d’hydrogène"><li>Peroxyde d’hydrogène </li></a>
                </ul>
            </div>   

            <div class="melange">
                <input type="submit" value="Créer un nouveau mélange">
            </div>
        </main>


    </body>
</html>