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

        <main class="formulaire_produit">
          <div class="ajout_produit">
            Ajout d'un nouveau produit
            <form method="post" action="insert_produit.php">

                <p>
                    Numéro CAS :<input type="text" name="num_cas"><br />
                    Nom du produit :<input type="text" name="nom_produit"><br />
                    Nom en anglais :<input type="text" name="nom_anglais"><br />
                    Nom scientifique :<input type="text" name="nom_scientifique"><br />
                    Formule brute :<input type="text" name="formule_brute"><br />
                    Quantité :<input type="text" name="quantite"><br />
                    Commentaire libre :<br />
                    <textarea name="com_libre" rows="3" colomns="25">
                    </textarea><br />
                    Fournisseur :<input type="text" name="fournisseur"><br />
                    Masse molaire :<input type="text" name="masse_molaire"><br />
                    Densité :<input type="text" name="densité"><br />
                    Température de fusion :<input type="text" name="temp_fusion"><br />
                    Température d'ébullition :<input type="text" name="temp_ebullition"><br />
                    Température d'autoflamme :<input type="text" name="temp_autoflamme"><br />
                    Indice optique :<input type="text" name="indice_optique"><br />
                    
                    <br />
                    Pictogramme de sécurité :<br/>
                    <?php 
                    require 'mysql_connect.php';

                    $requete_pict_secu = "SELECT nom FROM pictogramme_securite";
                    $resultat_pict_secu = mysqli_query($connection,$requete_pict_secu) or exit(mysqli_error($connection));
                    while($data_picto_secu=mysqli_fetch_array($resultat_pict_secu)) {
                        echo '<input type="checkbox" id="picto_secu" name="picto_secu[]" value="'.$data_picto_secu["nom"].'" /> <label for="picto_secu">'.$data_picto_secu["nom"].'</label>';
                    }
                    ?><br /><br />

                    Pictogramme de précaution :
                    <?php 
                    require 'mysql_connect.php';

                    $requete_pict_precau = "SELECT nom FROM pictogramme_precaution";
                    $resultat_pict_precau = mysqli_query($connection,$requete_pict_precau) or exit(mysqli_error($connection));
                    while($data_picto_precau=mysqli_fetch_array($resultat_pict_precau)) {
                       echo '<input type="checkbox" id="picto_precau" name="picto_precau[]" value="'.$data_picto_precau["nom"].'" /> <label for="picto_precau">'.$data_picto_precau["nom"].'</label>';
                    }
                    ?><br /><br />

                    Mélange dangereux :<input type="text" name="melange_dangereux"><br />
                    
                    <input type="submit" name="form_produit" value="Ajouter un produit">
                </p>
                
            </form>
          </div>
        </main>


    </body>
</html>
