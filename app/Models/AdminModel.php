<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    public function createUser (array $firstname, $lastname, $mdp, $mail, $role)
    {

        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mdp, mail, UserRole ) VALUE (? ,? ,? ,? ,?)');
        $user->execute(array($firstname, $lastname, $mdp, $mail, $role));

        return $user;
    } 
}