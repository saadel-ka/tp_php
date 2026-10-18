<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : Partie 0 et 1 - variables, constantes, types, chaînes
 * Date     : 18/10/2026
 */
require 'config.php';
echo '<meta charset="UTF-8">';
echo 'Hello PHP<br>';

// commentaire sur une ligne avec //
# commentaire sur une ligne avec #
/* commentaire
   sur plusieurs lignes */

// ---------- Exercice 1.1 : noms de variables ----------
// $x        : valide (commence par une lettre)
// $_x       : valide (commence par underscore)
// $2x       : INVALIDE (ne peut pas commencer par un chiffre)
// $x-y      : INVALIDE (le tiret est lu comme l'opérateur moins)
// $Prix_HT  : valide (lettres, underscore et majuscules autorisés)
// $prix ht  : INVALIDE (l'espace n'est pas autorisé)
// $état     : valide (PHP accepte les accents) mais je le déconseille
$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "ok";

$a = 5;
$A = 10;   // PHP fait la différence entre majuscules et minuscules
echo "\$a = $a et \$A = $A : ce sont deux variables différentes<br>";

// ---------- Exercice 1.2 : constantes ----------
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "NOTE_MIN = " . NOTE_MIN . "<br>";
echo "NOTE_MAX = " . NOTE_MAX . "<br>";
echo "SEUIL = " . SEUIL . "<br>";
var_dump(defined('SEUIL'));      // bool(true)
var_dump(defined('INCONNUE'));   // bool(false)
echo '<br>';
// Q1 : si on affiche une constante non définie, PHP 8 donne une erreur fatale
//      "Undefined constant" (avant PHP 8 : juste un warning).
// Q2 : const se fait au début du script (pas dans un if ou une boucle),
//      define() s'exécute pendant l'exécution donc on peut l'utiliser dans un if.

// ---------- Exercice 1.3 : calcul ----------
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + $prix_ht * $tva / 100;
echo "Le prix TTC du produit est de $prix_ttc €.<br>";

// ---------- Exercice 1.4 : types et conversions ----------
$test = 42;
$test = (string) $test;
var_dump($test);   // string(2) "42"
echo '<br>';

// Prédictions : 0 -> false, 0.0 -> false, "0" -> false, "" -> false,
//               "abc" -> true, [] -> false, null -> false
var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);
echo '<br>';

// Prédictions : (int)3.9 = 3, (int)"12abc" = 12, (float)"1.5e3" = 1500, (int)true = 1
var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);
echo '<br>';

echo "Décimal : " . 255 . "<br>";
echo "Hexadécimal : " . 0xFF . "<br>";
echo "Octal : " . 0377 . "<br>";
echo "Binaire : " . 0b11111111 . "<br>";

// ---------- Exercice 1.5 : chaînes ----------
$traitees = "égales à";
$ici = 2;
echo '1. Ahmed a dit : "J\'ai réussi"<br>';
echo '2. Voulez-vous supprimer C:\*.*?<br>';
echo '3. Ceci n\'affichera pas \n de nouvelle ligne (le \n doit apparaître tel quel)<br>';
echo '4. Les variables ne seront pas $traitees $ici (variables non interprétées)<br>';
echo "5. Les variables seront $traitees $ici (variables interprétées)<br>";

echo trim("*Bonjour les développeurs*", "*") . "<br>";

// Une lettre par ligne avec strlen() et for.
// J'ai enlevé l'accent du mot car strlen() compte les octets et "é" en prend 2,
// donc la lettre s'afficherait mal.
$mot = "Bonjour les developpeurs";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}
