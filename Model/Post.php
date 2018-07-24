<?php

require_once 'Model/Model.php';

class Post extends Model {
    
    // Return all post order by decreasing id
    public function getPosts(){
        $sql = 'SELECT id, title, content, author, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\')'
                . ' AS publication_date_fr FROM posts ORDER BY publication_date DESC';
        $posts = $this->executeQuery($sql);
        return $posts;
    }
    
        // Return all post order by decreasing id
    public function getLastPosts(){
        $sql = 'SELECT id, title, content, author, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\')'
                . ' AS publication_date_fr FROM posts ORDER BY publication_date DESC LIMIT 0,2';
        $posts = $this->executeQuery($sql);
        return $posts;
    }

    // return one post
    public function getPost($postId) {
        $sql = 'SELECT id, title, content, author, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\')'
                . ' AS publication_date_fr FROM posts WHERE id = ?';
         $post = $this->executeQuery($sql, array($postId));
        if ($post->rowCount() == 1) {
            return $post->fetch(); // Access to the first result line
        }  
        else {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$postId'");
        }
    }  
}