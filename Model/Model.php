<?php
// Return all post order by decreasing id
function getPosts(){
    $bdd = getBdd();
    $posts = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\')'
            . ' AS date_publication_fr FROM billets ORDER BY date_publication DESC');
    return $posts;
}

// return one post
function getPost($postId) {
    $bdd = getBdd();
    $post = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\')'
            . ' AS date_publication_fr FROM billets WHERE id = ?');
    $post->execute(array($postId));
    if ($post->rowCount() == 1) {
        return $post->fetch(); // Accès à la première ligne de résultat
    }  
    else {
        throw new Exception("Aucun billet ne correspond à l'identifiant '$postId'");
    }
}   
// return all comment of a post
function getComments($postId) {
    $bdd = getBdd();
    $comments = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT'
          . '(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM '
          . 'commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
    $comments->execute(array($postId));
    return $comments;
}


// BDD connection
function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=P8;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
