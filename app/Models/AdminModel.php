<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    // Création d'utilisateurs dans la bdd

    public function createUser (array $firstname, $lastname, $mdp, $mail, $role)
    {
        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mail, password, UserRoles ) VALUE (:firstname ,:lastname ,:mail ,:password , :UserRole )');
        $user->execute(array(
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":password" => $mdp,
            ":mail" => $mail,
            ":UserRole" => $role
        )
        );
        return $user;
    } 

    // récupération des roles dans la bdd

    public function getRole ()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role, id FROM roles');
        
        return $role;
    }
}
