<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    // Création d'utilisateurs dans la bdd

    public function createUser (array $firstname, $lastname, $mdp, $mail, $role)
    {

        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mdp, mail, UserRole ) VALUE (? ,? ,? ,? ,?)');
        $user->execute(array($firstname, $lastname, $mdp, $mail, $role));

        return $user;
    } 

    // récupération des roles dans la bdd

    public function getRole ()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role FROM roles');
        
        return $role;
    }
}
