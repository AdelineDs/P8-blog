<?php
namespace AdelineD\OC\P8\Model;

require_once 'Model/Model.php';

class Admin extends Model {
    
    //recupere le compte admin
    public function getAdmin($login) {
        $sql = 'SELECT id, pass FROM admin WHERE login= ? ';
        $admin = $this->executeQuery($sql, array($login));
        return $admin->fetch();   
    }
    
}