<?php

class last_locDB extends last_loc{
    
     private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    function getLocation() {
        try {
            $query = "SELECT * FROM location ORDER BY ID_LOCATION DESC LIMIT 1";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetch();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        
        return $data;
    }

    
    
    
    
}
