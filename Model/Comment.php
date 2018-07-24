<?php

require_once 'Model/Model.php';

class Comment extends Model {
    // return all comment of a post
    public function getComments($postId) {
        $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT'
              . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM '
              . 'comments WHERE post_id= ? ORDER BY comment_date DESC';
        $comments = $this->executeQuery($sql,array($postId));
        return $comments;
    }
    
    
}

