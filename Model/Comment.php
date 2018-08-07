<?php
namespace AdelineD\OC\P8\Model;

class Comment extends Model {
    
// return all comment of a post
    public function getComments($postId, $page) {
        $start = ($page-1)*5;
        $sql = 'SELECT id, post_id, author, comment, reported, DATE_FORMAT'
              . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM '
              . 'comments WHERE post_id= ? ORDER BY comment_date DESC LIMIT 5 OFFSET '.$start.'';
        $comments = $this->executeQuery($sql,array($postId));
        return $comments;
    }
    
    // return all reported comment
    public function getReportedCom() {
        $sql = 'SELECT * FROM posts INNER JOIN comments ON comments.post_id=posts.id WHERE comments.reported=1';
        $comments = $this->executeQuery($sql);
        return $comments;
    }

    //count the number og comment for a post
    public function getNbPages($postId){
        $sql = 'SELECT COUNT(*) AS nbComments FROM comments WHERE post_id= ?';
        $data = $this->executeQuery($sql, array($postId));
        $nbComments = $data->fetchColumn();
        $nbPages = ceil($nbComments/5);
        return $nbPages;
    }
    
    // insert new comment in bdd
    public function addComment($postId, $author, $comment){
        $sql = 'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executeQuery($sql, array($postId, $author, $comment, $date));
    }

    //delete all comments associated with a post in database
    public function deleteCom($postId) {
        $sql = 'DELETE FROM comments WHERE post_id= ?';
        $this->executeQuery($sql, array($postId));
    }
    
    //update a reported comment
    public function reportCom($idCom){
        $sql = 'UPDATE comments SET reported=1  WHERE id=?';
        $this->executeQuery($sql, array($idCom));
    }
    
    //return a comment
    public function getComment($idCom) {
        $sql = 'SELECT id, post_id, author, comment, DATE_FORMAT'
              . '(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM '
              . 'comments WHERE id= ? ';
        $comment= $this->executeQuery($sql, array($idCom));
        if ($comment->rowCount() == 1) {
            return $comment->fetch();
        }  //access to the first line of results
        else {
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCom'");
        }
    }

    //update the database after a comment moderation
    public function modifyComment($idCom, $author, $comment){
        $sql = 'UPDATE comments SET author= ?, comment=?, reported=2 WHERE id=?';
        $this->executeQuery($sql, array($author, $comment, $idCom));
    }

    //delete a comment in database
    public function confirm($idCom) {
        $sql = 'DELETE FROM comments WHERE id= ?';
        $this->executeQuery($sql, array($idCom));
    }
}

