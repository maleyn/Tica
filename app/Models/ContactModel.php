<?php

namespace Projet\Models;

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ContactModel extends Manager
{

    public function mailSubmit($contactMess)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('INSERT INTO contacts ( nom, prenom, email, objet, date, message ) 
                              VALUE (:nom, :prenom, :email, :objet, :date, :message )');
        $req->execute(array(
            ":nom" => $contactMess['nom'],
            ":prenom" => $contactMess['prenom'],
            ":email" => $contactMess['mail'],
            ":objet" => $contactMess['objet'],
            ":date" => date("Y-m-d H:i:s"),
            ":message" => $contactMess['message'],
        ));

    }
    public function getMailsCount()
    {
        $bdd = $this->dbConnection();
        $req = $bdd->query('SELECT COUNT(id) FROM contacts');

        return $req->fetch();

    }

    public function getContactMails()
    {
        $bdd = $this->dbConnection();
        $req = $bdd->query('SELECT id, nom, prenom, email, objet, date, message 
                            FROM contacts ORDER BY id DESC');

        return $req;

    }

    public function getMail($idMail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, nom, prenom, email, objet, date, message 
                            FROM contacts WHERE id = :id');
        $req->execute(array(":id" => $idMail));

        return $req->fetch();

    }

    public function deleteMail($idMail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('DELETE FROM contacts WHERE id = :id');
        $req->execute(array(":id" => $idMail));

        return $req;

    }

}