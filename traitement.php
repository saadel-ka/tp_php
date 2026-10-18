<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : valider les données POST et les enregistrer dans data/notes.csv
 * Date     : 18/10/2026
 */
require 'config.php';
require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$erreurs = [];

// J'utilise trim() !== '' en plus car empty("0") est vrai et la note 0 est valide
if (!isset($_POST['nom']) || !isset($_POST['note_info']) || !isset($_POST['note_math'])
    || trim($_POST['nom']) === '' || trim($_POST['note_info']) === '' || trim($_POST['note_math']) === '') {
    $erreurs[] = "Tous les champs sont obligatoires.";
} else {
    $nom = trim($_POST['nom']);
    $info = $_POST['note_info'];
    $math = $_POST['note_math'];

    if (!is_numeric($info) || $info < NOTE_MIN || $info > NOTE_MAX) {
        $erreurs[] = "La note d'info doit être entre " . NOTE_MIN . " et " . NOTE_MAX . ".";
    }
    if (!is_numeric($math) || $math < NOTE_MIN || $math > NOTE_MAX) {
        $erreurs[] = "La note de math doit être entre " . NOTE_MIN . " et " . NOTE_MAX . ".";
    }
}

if (count($erreurs) == 0) {
    // 5.1 : ajout d'une ligne dans le CSV (mode "a")
    $f = fopen("data/notes.csv", "a");
    // le 5e paramètre '\\' évite un warning en PHP 8.4
    fputcsv($f, [$nom, $info, $math], ';', '"', '\\');
    fclose($f);

    $moyenne = ($info + $math) / 2;
    echo "<h3>Récapitulatif</h3>";
    echo "<p>Nom : " . htmlspecialchars($nom) . "<br>";
    echo "Info : " . htmlspecialchars($info) . "<br>";
    echo "Math : " . htmlspecialchars($math) . "<br>";
    echo "Moyenne : $moyenne</p>";
    echo '<a href="saisie.html">Saisir un autre apprenant</a>';
} else {
    echo '<h3 style="color:red">Erreur</h3>';
    foreach ($erreurs as $e) {
        echo "<p style='color:red'>" . htmlspecialchars($e) . "</p>";
    }
    echo '<a href="saisie.html">Retour</a>';
}

// Q (5.1) : avec le mode "w" le fichier est vidé à chaque ouverture, donc on garderait
//           seulement le dernier apprenant.
// Q (4.3) : POST pour un mot de passe car GET l'affiche dans l'URL (historique, etc.).
// Q (4.3) : $_REQUEST contient les données de $_GET, $_POST et $_COOKIE.

include 'includes/pied_inc.php';
