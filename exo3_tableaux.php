<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : Partie 3 - tableaux (création, affichage, stats, tri, opérateurs)
 * Date     : 18/10/2026
 */
require 'config.php';
require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

// fonction d'affichage (exercice 3.4)
function afficher($tab)
{
    echo "<ul>";
    foreach ($tab as $cle => $valeur) {
        echo "<li>$cle : $valeur</li>";
    }
    echo "</ul>";
}

// ---------- 3.1 ----------
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["Structure de données en C", "Recherche opérationnelle et optimisation", "Probabilités et Statistique", "Modélisation Objet UML"];

echo "<h3>3.1 Modules</h3>";
foreach ($modules as $m) {
    echo "$m<br>";
}
for ($i = 0; $i < count($modules); $i++) {
    echo "Module $i : $modules[$i]<br>";
}

// ---------- 3.2 ----------
echo "<h3>3.2 Tableau des notes</h3>";
echo "<table>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo "<tr style='color:red'>";
    } else {
        echo "<tr>";
    }
    echo "<td>$nom</td><td>$note</td><td>" . mention($note) . "</td></tr>";
}
echo "</table>";

// ---------- 3.3 ----------
echo "<h3>3.3 Statistiques</h3>";
$somme = 0;
$nb = 0;
$max = NOTE_MIN;
$min = NOTE_MAX;
foreach ($notes as $note) {
    $somme = $somme + $note;
    $nb++;
    if ($note > $max) {
        $max = $note;
    }
    if ($note < $min) {
        $min = $note;
    }
}
$moyenne = $somme / $nb;
echo "Avec la boucle : somme = $somme, moyenne = " . round($moyenne, 2) . ", meilleure note = $max, plus faible = $min<br>";
echo "Avec les fonctions : somme = " . array_sum($notes) . ", moyenne = " . round(array_sum($notes) / count($notes), 2) . ", max = " . max($notes) . ", min = " . min($notes) . "<br>";

$effectifs = ["Très bien" => 0, "Bien" => 0, "Assez bien" => 0, "Passable" => 0, "Ajourné" => 0];
foreach ($notes as $note) {
    $m = mention($note);
    $effectifs[$m]++;
}
echo "Nombre d'apprenants par mention :";
afficher($effectifs);

// ---------- 3.4 ----------
echo "<h3>3.4 Tris</h3>";
$t = $notes;
ksort($t);
echo "<b>Noms croissants (ksort)</b>";
afficher($t);

$t = $notes;
arsort($t);
echo "<b>Notes décroissantes (arsort)</b>";
afficher($t);

$t = $notes;
krsort($t);
echo "<b>Noms décroissants (krsort)</b>";
afficher($t);

$t = $notes;
asort($t);
echo "<b>Notes croissantes (asort)</b>";
afficher($t);
// Q : pour un tableau indexé comme $modules on utilise sort() (ou rsort() pour l'ordre inverse)

// ---------- 3.5 ----------
echo "<h3>3.5 Opérateurs de tableaux</h3>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo "<pre>";
var_dump($a + $b);    // union des deux tableaux : x => 1, y => 2
var_dump($a == $b);   // true : mêmes couples clé/valeur
var_dump($a === $b);  // false : pas le même ordre
echo "</pre>";

/* ---------- 4.1 : expériences ----------
 * Expérience 1 (fichier qui n'existe pas) :
 *   include 'nexiste_pas.php' -> Warning, le reste du script continue.
 *   require 'nexiste_pas.php' -> Fatal error, le script s'arrête.
 * Expérience 2 (menu_inc.php inclus deux fois) :
 *   include      -> le menu s'affiche deux fois.
 *   include_once -> la deuxième inclusion est ignorée, le menu s'affiche une seule fois.
 */

include 'includes/pied_inc.php';
