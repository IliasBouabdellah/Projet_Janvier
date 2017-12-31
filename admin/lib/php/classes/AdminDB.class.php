
<?php

class AdminDB extends Admin {

    private $_db;
    private $_admin = array();
    //private $iduser;



    public function __construct($db) {
        $this->_db = $db;
        
    }

    function isAdmin($login,$password) {
        //$password = md5($password);
        try {
            $query = "select ID_USER,USERNAME,PASSWORD from UTILISATEUR where USERNAME=:login and PASSWORD=:password";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login', $login);
            $resultset->bindValue(':password', $password);
            //$resultset->bindValue('ID_USER', $iduser);
            
           // $resultset->bindValue(':',$iduser);
            $resultset->execute();
            $data = $resultset->fetch();
            //var_dump($data);
            if (!empty($data)) {
                try {
                    $_admin[] = new Admin($data);
                    $iduser = $_admin[0]->ID_USER;
                    
                  
                    
                    if ($_admin[0]->USERNAME == "$login" && $_admin[0]->PASSWORD == $password) {
                      $_SESSION['id_user'] = $iduser;
                      $_SESSION['login']=$login;
                      
                        
                        return $_admin;
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            print "Echec de la requete." . $e->getMessage();
        }
    }

}