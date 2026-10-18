<?php
/*
 * Auteur   : Saad Elkadaoui
 * Objectif : constantes globales + fonction mention() réutilisée par les autres pages
 * Date     : 18/10/2026
 */

// const : défini à la compilation (utilisable au niveau global / dans une classe)
const ETABLISSEMENT = "Faculté des Sciences Semlalia Marrakech (FSSM) - Informatique Appliquée S3";

// define() : défini à l'exécution (le nom peut être calculé, utilisable dans un if)
define('NOTE_MIN', 0);
define('NOTE_MAX', 20);
define('SEUIL', 10);

// Exercice 2.1 : mention() est placée ici pour être réutilisée (exo2, exo3, liste)
function mention($note)
{
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}
