<?php

namespace Projet\Models;

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ContactModel extends Manager
{
    // ajoute les données du mail envoyé dans la bdd

    public function mailSubmit($contactMess)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('INSERT INTO contacts ( nom, prenom, email, objet, date, message ) 
                              VALUE (:nom, :prenom, :email, :objet, :date, :message )');
        $req->execute(array(
            "nom" => $contactMess['nom'],
            "prenom" => $contactMess['prenom'],
            "email" => $contactMess['mail'],
            "objet" => $contactMess['objet'],
            "date" => date("Y-m-d H:i:s"),
            "message" => $contactMess['message'],
        ));

    }

    // récupération du nombre de mail actuellement dans la bdd

    public function getMailsCount()
    {
        $bdd = $this->dbConnection();
        $req = $bdd->query('SELECT COUNT(id) FROM contacts');

        return $req->fetch();

    }

    // récupération des infos de tout les mails reçu

    public function getContactMails()
    {
        $bdd = $this->dbConnection();
        $req = $bdd->query('SELECT id, nom, prenom, email, objet, date, message 
                            FROM contacts ORDER BY id DESC');

        return $req;
        
    }

    // récupération des infos d'un mail en fonction de son id

    public function getMail($idMail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, nom, prenom, email, objet, date, message 
                            FROM contacts WHERE id = :id');
        $req->execute(array("id" => $idMail));

        return $req->fetch();

    }
    
    // suppression d'un mail en fonction de son id

    public function deleteMail($idMail)
    {
        
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM contacts WHERE id = :id');
        $req->execute(array("id" => $idMail));

        return $req;

    }

}