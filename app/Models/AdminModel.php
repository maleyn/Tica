<?php 

namespace Projet\Models;

class AdminModel extends Manager
{

    // Création d'utilisateurs dans la bdd

    public function createUser($userArray)
    {
        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mail, password, UsersRoles ) 
                               VALUE (:firstname ,:lastname ,:mail ,:password , :UsersRoles )');
        $user->execute(array(

            ":firstname" => $userArray['prenom'],
            ":lastname" => $userArray['nom'],
            ":mail" => $userArray['mail'],
            ":password" => $userArray['mdp'],
            ":UsersRoles" => $userArray['role']
        )
        );
        
        return $user;
    } 

    // récupération des infos de roles dans la bdd

    public function getRole()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role FROM roles');
        
        return $role;
    }

    // récupération de l'id du role utilisateur

    public function getRoleId($role)

    {
        $bdd = $this->dbConnection();
        $id = $bdd->prepare("SELECT id FROM roles WHERE role = :role");
        $id->execute(array(':role' => $role));
        
        return $id->fetch();

    }

    // récupération des infos de l'utilisateur en fonction de son mail

    public function getPass($mail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, firstname, lastname, mail, password, UsersRoles 
                              FROM users WHERE mail = :mail');
        $req->execute(array(':mail' => $mail));

        return $req;

    }

    

    // récuperer une id grace au nom et table

    public function getIdTable($table, $name)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT id FROM `" .$table. "`WHERE name = :name");
   
        $data->execute(array('name' => $name,));
   
        return $data->fetch();
    }
   
    
}
