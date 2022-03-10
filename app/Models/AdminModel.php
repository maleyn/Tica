<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    // Création d'utilisateurs dans la bdd

    public function createUser ($firstname, $lastname, $mdp, $mail, $role)
    {
        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mail, password, UsersRoles ) VALUE (:firstname ,:lastname ,:mail ,:password , :UsersRoles )');
        $user->execute(array(

            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":mail" => $mail,
            ":password" => $mdp,
            ":UsersRoles" => $role[0]
        )
        );
        
        return $user;
    } 

    // récupération des infos de roles dans la bdd

    public function getRole ()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role FROM roles');
        
        return $role;
    }

    // récupération de l'id du role utilisateur

    public function getRoleId ($role)

    {
        $bdd = $this->dbConnection();
        $id = $bdd->prepare("SELECT id FROM roles WHERE role = :roleu");
        $id->execute(array(':roleu' => $role));
        
        return $id->fetch();

    }

    public function getPass ($mail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, firstname, lastname, mail, password, UsersRoles FROM users WHERE mail = :mail');
        $req->execute(array(':mail' => $mail));

        return $req;

    }
}
