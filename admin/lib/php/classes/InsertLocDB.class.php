<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class InsertLocDB extends InsertLoc {

    private $_db;
    private $_locationArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getLocation($id) {
        $query = "select * from client where id_location=:id";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_locationArrayArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_locationArrayArray;
    }

    public function addLocation(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        /* $query="select ajout_client (:nom_client,:prenom_client,:email_client,:telephone,:adresse_client,"
          . ":numero,:codepostal,:localite) as retour";
         */
        $query = "insert into Location (ID_USER,ID_HABITATION,DATE_DEBUT_BAIL,DATE_FIN_BAIL)"
                . " values (:id_user,:id_location,:date_debut_bail,:date_fin_bail)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_user',$_SESSION['id_user'], PDO::PARAM_STR);
	    $resultset->bindValue(':id_location',$_SESSION['id_habitation'], PDO::PARAM_STR);
            $resultset->bindValue(':date_debut_bail', $data['date_debut_bail'], PDO::PARAM_STR);
            $resultset->bindValue(':date_fin_bail', $data['date_fin_bail'], PDO::PARAM_STR);
            $resultset->execute();
           //$email=$resultset->bindValue(':email', $data['email1'], PDO::PARAM_STR);
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        
         }
         
         print "Merci pour votre location";



       
//==========
    }

//put your code here
}
