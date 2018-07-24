<?php

require_once 'Model/Model.php';

class Comment extends Model {
    // return all comment of a post
    public function getComments($postId) {
        $bdd = getBdd();
        $comments = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT'
              . '(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM '
              . 'commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));
        return $comments;
    }
    
    
}

