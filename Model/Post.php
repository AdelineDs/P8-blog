<?php
namespace AdelineD\OC\P8\Model;

require_once 'Model/Model.php';

class Post extends Model {
    
    // Return all post order by decreasing id
    public function getPosts($page){
        $start = ($page-1)*5;
        $sql = 'SELECT id, title, content, author, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%imin%ss\')'
                . ' AS publication_date_fr FROM posts ORDER BY publication_date DESC LIMIT 5 OFFSET '.$start.'';
        $posts = $this->executeQuery($sql, array($start));
        return $posts;
    }
    
    // Return the 2 latest posts order by decreasing publication date
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
    
    //return number of pages posts
    public function getNbPages(){
        $sql = 'SELECT COUNT(*) AS nbPosts FROM posts';
        $data = $this->executeQuery($sql);
        $nbPosts = $data->fetchColumn();
        $nbPages = ceil($nbPosts/5);
        return $nbPages;
    }
    
    //insert new post in database
    public function insertPost($title, $content, $author){
        $sql = 'INSERT INTO posts(title, content, author, publication_date) VALUES(?,?, ?, NOW())';
        $this->executeQuery($sql, array($title, $content, $author));
    }


    //edit post in database
    public function editPost($postId, $title, $content, $author){
        $sql = 'UPDATE posts SET title =?, content=?, author=? WHERE id=?';
        $result = $this->executeQuery($sql, array($title, $content, $author, $postId));
    }
    
    //delete post in database
    public function deletePost($postId) {
        $sql = 'DELETE FROM posts WHERE id= ?';
        $this->executeQuery($sql, array($postId));
    }
}