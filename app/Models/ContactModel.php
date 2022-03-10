<?php

namespace Projet\Models;

class ContactModel extends Manager
{

    public function mailSubmit($contactMess)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('INSERT INTO contacts ( nom, prenom, email, objet, message ) VALUE (:nom, :prenom, :email, :objet, :message )');
        $req->execute(array(
            ":nom" => $contactMess['nom'],
            ":prenom" => $contactMess['prenom'],
            ":email" => $contactMess['mail'],
            ":objet" => $contactMess['objet'],
            ":message" => $contactMess['message'],
        ));

    }


}