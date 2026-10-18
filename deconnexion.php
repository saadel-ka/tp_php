<?php
/* Auteur : Saad Elkadaoui | Objectif : déconnexion (destruction de session) | Date : 18/10/2026 */
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
