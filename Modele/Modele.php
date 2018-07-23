<?php
// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets(){
    $bdd = getBdd();
    $billets = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\')'
            . ' AS date_publication_fr FROM billets ORDER BY date_publication DESC');
    return $billets;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\')'
            . ' AS date_publication_fr FROM billets WHERE id = ?');
    $billet->execute(array($idBillet));
    if ($billet->rowCount() == 1) {
        return $billet->fetch(); // Accès à la première ligne de résultat
    }  
    else {
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}   
// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT'
          . '(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM '
          . 'commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
    $commentaires->execute(array($idBillet));
    return $commentaires;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=P8;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
