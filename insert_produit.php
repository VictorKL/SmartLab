<?php 
require 'mysql_connect.php';
require_once 'vendor/autoload.php';

$num_cas = isset($_POST['num_cas']) ? $_POST['num_cas'] : '';
$nom_produit = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : '';
$nom_anglais = isset($_POST['nom_anglais']) ? $_POST['nom_anglais'] : '';
$nom_scientifique = isset($_POST['nom_scientifique']) ? $_POST['nom_scientifique'] : '';
$formule_brute = isset($_POST['formule_brute']) ? $_POST['formule_brute'] : '';
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : '';
$com_libre = isset($_POST['com_libre']) ? $_POST['com_libre'] : '';
$fournisseur = isset($_POST['fournisseur']) ? $_POST['fournisseur'] : '';
$masse_molaire = isset($_POST['masse_molaire']) ? $_POST['masse_molaire'] : '';
$densité = isset($_POST['densité']) ? $_POST['densité'] : '';
$temp_fusion = isset($_POST['temp_fusion']) ? $_POST['temp_fusion'] : '';
$temp_ebullition = isset($_POST['temp_ebullition']) ? $_POST['temp_ebullition'] : '';
$temp_autoflamme = isset($_POST['temp_autoflamme']) ? $_POST['temp_autoflamme'] : '';
$indice_optique = isset($_POST['indice_optique']) ? $_POST['indice_optique'] : '';
$picto_secu_total = '';
if (isset($_POST['picto_secu'])) 
{
    foreach($_POST['picto_secu'] as $picto_secu)
    {
        $picto_secu_total = $picto_secu.' '.$picto_secu_total ;
    }
}
else
{
    $picto_secu_total = '';
}
$picto_precau_total = '';
if (isset($_POST['picto_precaution'])) 
{
    foreach($_POST['picto_precaution'] as $picto_precau)
    {
        $picto_precau_total = $picto_precau.' '.$picto_precau_total ;
    }
}
else
{
    $picto_precau_total = '';
}
$picto_precaution = isset($_POST['picto_precaution']) ? $_POST['picto_precaution'] : '';
$melange_dangereux = isset($_POST['melange_dangereux']) ? $_POST['melange_dangereux'] : '';

//header('Content-Type: image/png');

$qr = new Endroid\QrCode\QrCode();
//$qr->setText('Numéro CAS : '.$num_cas.', nom : '.$nom_scientifique.', quantité : '.$quantite);
$qr->setText('http://localhost/Chimie/fiche_simplifi%C3%A9e.php?recherche_produit='.$nom_scientifique.'');
$qr->setSize(300);
$qr->setPadding(10);
//$qr->setEncoding('UTF-8');

$dossier = 'qr_codes';
if(!is_dir($dossier)){
   mkdir($dossier);
}
$chemin = $dossier.'/qrcode_'.$nom_scientifique.'.png';
$qr->save($chemin);
$qr_data = mysqli_real_escape_string($connection,$chemin);

$requete_insert_produit = "INSERT INTO `produit`(
    `designation_francaise`, 
    `designation_anglaise`, 
    `designation_scientifique`, 
    `formule_brute`, 
    `quantite`, 
    `commentaire_libre`, 
    `fournisseur`, 
    `masse_molaire`, 
    `densite`, 
    `temp_fusion_celsius`, 
    `temp_ebullition_celsius`, 
    `temp_autoflamme_celsius`, 
    `indice_optique`, 
    `num_cas`, 
    `pictogramme_securite`, 
    `pictogramme_precaution`, 
    `auteur`,
    `melange_dangereux`,
    `QR_code` 
    ) 
    VALUES (
    '".mysqli_real_escape_string($connection,$nom_produit)."',
    '".mysqli_real_escape_string($connection,$nom_anglais)."',
    '".mysqli_real_escape_string($connection,$nom_scientifique)."',
    '".mysqli_real_escape_string($connection,$formule_brute)."',
    '".$quantite."',
    '".$com_libre."',
    '".mysqli_real_escape_string($connection,$fournisseur)."',
    '".$masse_molaire."',
    '".$densité."',
    '".$temp_fusion."',
    '".$temp_ebullition."',
    '".$temp_autoflamme."',
    '".$indice_optique."',
    '".mysqli_real_escape_string($connection,$num_cas)."',
    '".mysqli_real_escape_string($connection,$picto_secu_total)."',
    '".mysqli_real_escape_string($connection,$picto_precau_total)."',
    'jojo',
    '".mysqli_real_escape_string($connection,$melange_dangereux)."',
    '$qr_data')";
    echo $requete_insert_produit;
    $resultat_insert_produit = mysqli_query($connection,$requete_insert_produit) or exit(mysqli_error($connection));

    header('Location: index.php'); 

/*
    `pictogramme_securite`, 
    `pictogramme_precaution`, 


    $picto_secu,
    $picto_precaution,
    */
?>