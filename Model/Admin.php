<?php
namespace AdelineD\OC\P8\Model;

class Admin extends Model {
    
    //get admin account
    public function getAdmin($login) {
        $sql = 'SELECT id, pass FROM admin WHERE login= ? ';
        $admin = $this->executeQuery($sql, array($login));
        return $admin->fetch();   
    }
    
}