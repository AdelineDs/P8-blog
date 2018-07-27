<?php

require_once 'Model/Model.php';

class Comment extends Model {
    
// return all comment of a post
    public function getComments($postId, $page) {
        $start = ($page-1)*7;
        $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT'
              . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM '
              . 'comments WHERE post_id= ? ORDER BY comment_date DESC LIMIT 7 OFFSET '.$start.'';
        $comments = $this->executeQuery($sql,array($postId));
        return $comments;
    }
    
    public function getNbPages($postId){
        $sql = 'SELECT COUNT(*) AS nbComments FROM comments WHERE post_id= ?';
        $data = $this->executeQuery($sql, array($postId));
        $nbComments = $data->fetchColumn();
        $nbPages = ceil($nbComments/7);
        return $nbPages;
    }
    
    // insert new comment in bdd
    public function addComment($postId, $author, $comment){
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executeQuery($sql, array($postId, $author, $comment, $date));
    }

    //realise la suppression de tout les commentaires associés à un billet dans la base de données
    public function deleteCom($postId) {
        $sql = 'DELETE FROM comments WHERE post_id= ?';
        $this->executeQuery($sql, array($postId));
    }
    
    
}

