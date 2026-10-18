<?php
/* Auteur : Saad Elkadaoui | Objectif : page protégée par session | Date : 18/10/2026 */
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'config.php';
require 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Bienvenue " . htmlspecialchars($_SESSION['login']) . " !</h2>";
echo '<p><a href="deconnexion.php">Se déconnecter</a></p>';

include 'includes/pied_inc.php';
