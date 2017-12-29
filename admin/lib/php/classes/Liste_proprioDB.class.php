<?php

class Liste_proprioDB extends Liste_proprio {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    function getProprio() {
        try {
            $query = "SELECT * FROM proprio";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

}
