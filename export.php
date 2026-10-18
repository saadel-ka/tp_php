<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : exporter les résultats en JSON, relire, comparer serialize / json_encode
 * Date     : 18/10/2026
 */
require 'config.php';
require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$resultats = [];

if (file_exists("data/notes.csv")) {
    $f = fopen("data/notes.csv", "r");
    while (($l = fgetcsv($f, 0, ';', '"', '\\')) !== false) {
        $resultats[] = [
            "nom" => $l[0],
            "info" => (float) $l[1],
            "math" => (float) $l[2],
            "moyenne" => ($l[1] + $l[2]) / 2
        ];
    }
    fclose($f);
}

if (count($resultats) == 0) {
    echo "<p>Aucune donnée à exporter. Saisissez d'abord des apprenants.</p>";
    include 'includes/pied_inc.php';
    exit;
}

// 2. écriture dans le fichier JSON
$json = json_encode($resultats, JSON_PRETTY_PRINT);
file_put_contents("data/notes.json", $json);

// 3. relecture
$contenu = file_get_contents("data/notes.json");
$lu = json_decode($contenu, true);
echo "<h3>Relu avec json_decode (print_r)</h3>";
echo "<pre>";
print_r($lu);
echo "</pre>";

// 4. comparaison
echo "<h3>json_encode</h3><pre>" . htmlspecialchars($json) . "</pre>";
echo "<h3>serialize</h3><pre>" . htmlspecialchars(serialize($resultats)) . "</pre>";
// serialize : format propre à PHP, difficile à lire dans un autre langage.
// json_encode : format texte standard lisible par tous les langages.
// Q : JSON est directement utilisable par JavaScript (JSON.parse).

include 'includes/pied_inc.php';
