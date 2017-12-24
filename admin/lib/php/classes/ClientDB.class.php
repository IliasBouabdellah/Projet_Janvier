<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClientDB extends Client {

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getClient($email) {
        $query = "select * from client where emailt=:email";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email_client', $email, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }

    public function addClient(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        /* $query="select ajout_client (:nom_client,:prenom_client,:email_client,:telephone,:adresse_client,"
          . ":numero,:codepostal,:localite) as retour";
         */
        $query = "insert into utilisateur (USERNAME,PASSWORD,EMAIL,NOM,PRENOM,ADRESSE,TEL)"
                . " values (:pseudo,:password,:email,:nom,:prenom,:adresse,:telephone)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':password', $data['password'], PDO::PARAM_STR);
            $resultset->bindValue(':email', $data['email1'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone', $data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':pseudo', $data['pseudo'], PDO::PARAM_STR);
            $resultset->execute();
           $email=$resultset->bindValue(':email', $data['email1'], PDO::PARAM_STR);
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }



       
//==========
    }

//put your code here
}
