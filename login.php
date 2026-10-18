<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : connexion avec session + cookies (dernier_login)
 * Date     : 18/10/2026
 */
session_start();   // première instruction du fichier
require 'config.php';

$erreur = "";

if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if ($login != "") {
        $_SESSION['login'] = $login;

        // 6.2.1 : cookie valable 24h
        setcookie("dernier_login", $login, time() + 86400, "/");

        // 6.2.3 variante : un seul cookie avec login + date en JSON
        $infos = ["login" => $login, "date" => date('d/m/Y H:i:s')];
        setcookie("infos_login", json_encode($infos), time() + 86400, "/");

        header("Location: profil.php");
        exit;
    } else {
        $erreur = "Veuillez saisir un login.";
    }
}

// 6.2.2 : pré-remplir le champ avec le cookie
$valeur = "";
if (isset($_COOKIE['dernier_login'])) {
    $valeur = $_COOKIE['dernier_login'];
}

// lecture du cookie JSON
$derniere = null;
if (isset($_COOKIE['infos_login'])) {
    $derniere = json_decode($_COOKIE['infos_login'], true);
}

require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Connexion</h2>";
if ($erreur != "") {
    echo "<p style='color:red'>$erreur</p>";
}
if ($derniere != null) {
    echo "<p>Dernière connexion : " . htmlspecialchars($derniere['login']) . " le " . htmlspecialchars($derniere['date']) . "</p>";
}
echo '<form method="post" action="login.php">';
echo 'Login : <input type="text" name="login" value="' . htmlspecialchars($valeur) . '"> ';
echo '<input type="submit" value="Se connecter">';
echo '</form>';

// Q : une session est stockée côté serveur (le navigateur garde seulement l'ID PHPSESSID),
//     un cookie est stocké côté client, dans le navigateur.
// Q : setcookie() et header() envoient des en-têtes HTTP, qui doivent partir avant le
//     contenu de la page. Après un echo ou du HTML : "headers already sent".

include 'includes/pied_inc.php';
