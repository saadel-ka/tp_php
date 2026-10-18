<?php
/* Auteur : Saad Elkadaoui | Objectif : traiter le formulaire GET | Date : 18/10/2026 */
echo '<meta charset="UTF-8">';
$nom = htmlspecialchars($_GET['nom']);
$prenom = htmlspecialchars($_GET['prenom']);
$sexe = $_GET['sexe'];

if ($sexe == "F") {
    echo "Bonjour Madame $prenom $nom";
} else {
    echo "Bonjour Monsieur $prenom $nom";
}
// Dans l'URL on voit : info.php?nom=...&prenom=...&sexe=M
// (les données sont visibles, donc GET est à éviter pour les données sensibles)
