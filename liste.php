<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : lire data/notes.csv et afficher la liste + moyenne de la classe
 * Date     : 18/10/2026
 */
require 'config.php';
require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$fichier = "data/notes.csv";

if (!file_exists($fichier)) {
    echo "<p>Le fichier notes.csv n'existe pas encore. Saisissez d'abord des apprenants.</p>";
    include 'includes/pied_inc.php';
    exit;
}

$f = fopen($fichier, "r");
if (!$f) {
    echo "<p style='color:red'>Impossible d'ouvrir le fichier.</p>";
    exit;
}

echo "<h3>5.2 Liste (fgetcsv)</h3>";
echo "<table>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";
$total = 0;
$nb = 0;
while (($ligne = fgetcsv($f, 0, ';', '"', '\\')) !== false) {
    $nom = $ligne[0];
    $info = $ligne[1];
    $math = $ligne[2];
    $moy = ($info + $math) / 2;
    $total = $total + $moy;
    $nb++;
    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . round($moy, 2) . "</td>";
    echo "<td>" . mention($moy) . "</td>";
    echo "</tr>";
}
echo "</table>";
fclose($f);

if ($nb > 0) {
    echo "<p><strong>Moyenne générale de la classe : " . round($total / $nb, 2) . "</strong></p>";
}

// ---------- 5.3 : lecture avec fgets / feof / explode ----------
echo "<h3>5.3 Lecture avec fgets, feof et explode</h3>";
$f = fopen($fichier, "r");
while (!feof($f)) {
    $ligne = fgets($f);
    if (trim($ligne) != "") {
        $champs = explode(';', trim($ligne));
        echo htmlspecialchars($champs[0]) . " | " . $champs[1] . " | " . $champs[2] . "<br>";
    }
}
fclose($f);
/*
 * Comparaison :
 * fgetcsv : + donne directement un tableau, gère les guillemets et les ';' dans un champ ;
 *           - on ne voit pas la ligne brute.
 * fgets + explode : + simple, on contrôle la ligne ; - on doit nettoyer le \n avec trim(),
 *           et ça casse si un champ contient ';' ; feof() peut donner une ligne vide à la fin.
 */

include 'includes/pied_inc.php';
