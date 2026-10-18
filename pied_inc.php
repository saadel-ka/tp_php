<?php
/* Auteur : Saad Elkadaoui | Objectif : pied de page (dates) | Date : 18/10/2026 */

// 6.3.1 : date du jour au format 14/10/2026
$aujourdhui = date('d/m/Y');

// 6.3.2 : jours restants avant la fin du semestre (date choisie : 31/01/2027)
$fin = new DateTime('2027-01-31');
$auj = new DateTime('today');
$diff = $auj->diff($fin);
if ($auj > $fin) {
    $joursRestants = 0;   // le semestre est déjà fini
} else {
    $joursRestants = $diff->days;
}

// 6.3.3 : validation d'une date (jour, mois, année) avec checkdate()
$jour = 29;
$mois = 2;
$annee = 2027;   // 2027 n'est pas bissextile, donc la date est invalide
if (checkdate($mois, $jour, $annee)) {
    $texteDate = "date valide";
} else {
    $texteDate = "date invalide";
}

echo "<footer>";
echo "<p>Date du jour : $aujourdhui | ";
echo "Jours restants avant la fin du semestre : $joursRestants | ";
echo "Test checkdate($jour/$mois/$annee) : $texteDate</p>";
echo "</footer>";
echo "</body></html>";
