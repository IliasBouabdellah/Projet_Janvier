<?php
class Vue_HabitationDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    //liste des gâteaux correspondant au choix du type dans liste déroulante
    function getVue_habitationType($id){
         try {            
            $query = "SELECT * FROM vue_habitation where id_th=:id_th";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_th',$id);
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
    

    function getVue_habitation(){
         try {
            $query = "SELECT * FROM vue_habitation order by id_TH";
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
    
    function getVue_habitationloc($id){
         try {            
            $query = "SELECT * FROM vue_habitation where id_TH=:id_TH";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_TH',$id);
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
