<?php

require_once 'Model/Model.php';

class Post extends Model {
    
    // Return all post order by decreasing id
    public function getPosts(){
        $bdd = getBdd();
        $posts = $bdd->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\')'
                . ' AS date_publication_fr FROM billets ORDER BY date_publication DESC');
        return $posts;
    }

    // return one post
    public function getPost($postId) {
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
}