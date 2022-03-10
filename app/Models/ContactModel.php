<?php

namespace Projet\Models;

class ContactModel extends Manager
{

    public function mailSubmit($lastname, $firstname, $mail, $objet, $message)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('INSERT INTO contacts ( nom, prenom, email, objet, message ) VALUE (:nom, :prenom, :email, :objet, :message )');
        $req->execute(array(
            ":nom" => $lastname,
            ":prenom" => $firstname,
            ":email" => $mail,
            ":objet" => $objet,
            ":message" => $message,
        ));

    }


}