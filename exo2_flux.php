<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : Partie 2 - structures de contrôle et boucles
 * Date     : 18/10/2026
 */
require 'config.php';   // la fonction mention() est dans config.php
echo '<meta charset="UTF-8">';

// ---------- 2.1 : mention() ----------
echo "<h3>2.1 Mentions</h3>";
echo "18 : " . mention(18) . "<br>";
echo "16 : " . mention(16) . "<br>";
echo "14 : " . mention(14) . "<br>";
echo "12 : " . mention(12) . "<br>";
echo "10 : " . mention(10) . "<br>";
echo "7 : " . mention(7) . "<br>";

// ---------- 2.2 : switch ----------
echo "<h3>2.2 Mois courant</h3>";
$mois = date("m");
switch ($mois) {
    case "01": $nom = "Janvier"; break;
    case "02": $nom = "Février"; break;
    case "03": $nom = "Mars"; break;
    case "04": $nom = "Avril"; break;
    case "05": $nom = "Mai"; break;
    case "06": $nom = "Juin"; break;
    case "07": $nom = "Juillet"; break;
    case "08": $nom = "Août"; break;
    case "09": $nom = "Septembre"; break;
    case "10": $nom = "Octobre"; break;
    case "11": $nom = "Novembre"; break;
    case "12": $nom = "Décembre"; break;
    default: $nom = "Mois inconnu";
}
echo "Nous sommes en $nom<br>";
// Q : si on oublie un break, PHP continue avec les case suivants
//     jusqu'au prochain break, donc $nom serait écrasé.

echo "<h3>2.3 Boucles</h3>";
// 1. triangle avec deux for imbriquées
echo "<pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "</pre>";

// 2. while de 0 à 20 par pas de 2 (10 en gras)
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i = $i + 2;
}
echo "<br>";

// 3. for avec continue : seulement les nombres pairs de 0 à 10
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i ";
}
echo "<br>";

// 4. while + switch + break 2
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;       // sort seulement du switch
        case 10:
            echo "At 10; quitting<br>";
            break 2;     // sort du switch et de la boucle
    }
    $i++;
}

// 5. même chose que la question 2 avec do-while
$i = 0;
do {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i = $i + 2;
} while ($i <= 20);
echo "<br>";
// Différence : do-while exécute le corps au moins une fois (la condition est
// testée après), alors que while teste la condition avant et peut ne jamais entrer.
