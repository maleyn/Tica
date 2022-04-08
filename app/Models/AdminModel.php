<?php 

namespace Projet\Models;

class AdminModel extends Manager
{
    // récupération des stats administration

    public function getCountTotal()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query('SELECT (SELECT COUNT(users.id) FROM users) AS nbusers, 
                            (SELECT COUNT(paints.id) FROM paints) AS nbpaints, 
                            (SELECT COUNT(painters.id) FROM painters) AS nbpainters, 
                            (SELECT COUNT(articles.id) FROM articles) AS nbarticles');

        return $data->fetch();
    }

    // Création d'utilisateurs dans la bdd

    public function createUser($userArray)
    {
        $bdd = $this->dbConnection();
        $user = $bdd->prepare('INSERT INTO users ( firstname, lastname, mail, password, UsersRoles ) 
                               VALUE (:firstname ,:lastname ,:mail ,:password , :UsersRoles )');
        $user->execute(array(

            "firstname" => $userArray['prenom'],
            "lastname" => $userArray['nom'],
            "mail" => $userArray['mail'],
            "password" => $userArray['mdp'],
            "UsersRoles" => $userArray['role']
        )
        );
        
    } 

    // récupération des infos de roles dans la bdd

    public function getRole()
    {

        $bdd = $this->dbConnection();
        $role = $bdd->query('SELECT role FROM roles');
        
        return $role;
    }

    // récupération du role de l'utilisateur

    public function getRoleUser($idUser)
    {

        $bdd = $this->dbConnection();
        $role = $bdd->prepare('SELECT role FROM roles, users WHERE roles.id = users.UsersRoles AND users.id = :iduser');
        $role->execute(array('iduser' => $idUser));

        return $role->fetch();
    }
    // récupération de l'id du role utilisateur

    public function getRoleId($role)

    {
        $bdd = $this->dbConnection();
        $id = $bdd->prepare("SELECT id FROM roles WHERE role = :role");
        $id->execute(array('role' => $role));
        
        return $id->fetch();

    }

    // récupération des infos de l'utilisateur en fonction de son mail

    public function getPass($mail)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('SELECT id, firstname, lastname, mail, password, UsersRoles 
                              FROM users WHERE mail = :mail');
        $req->execute(array('mail' => $mail));

        return $req;

    }

    // mise à jour des infos personelles

    public function updateSelfInfos($idaccount, $lastname, $firstname)
    {
        $bdd = $this->dbConnection();
        $req = $bdd->prepare('UPDATE users 
                              SET firstname = :firstname, lastname = :lastname
                              WHERE id = :iduser');

        $req->execute(array(
            'iduser' => $idaccount,
            'firstname' => $firstname,
            'lastname' => $lastname));

    }
    
    // supprimer un utilisateur d'administration de la bdd

    public function deleteThisUser($idUser)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare('DELETE FROM users WHERE id = :iduser');

        $data->execute(array('iduser' => $idUser));
    }

    // récuperer une id grace au nom et table

    public function getIdTable($table, $name)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT id FROM `" .$table. "`WHERE name = :name");
   
        $data->execute(array('name' => $name));
   
        return $data->fetch();
    }
    
    // récupérer les infos de tout les utilisateurs d'administration

    public function getUsersinfos()
    {
        $bdd = $this->dbConnection();
        $data = $bdd->query("SELECT users.id, firstname, lastname, mail, role 
                            FROM users, roles
                            WHERE roles.id = users.UsersRoles");

        return $data->fetchAll();

    }
   
    // récupérer les infos d'un utilisateur en fonction de son id

    public function getUserInfos($idUser)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("SELECT users.id, firstname, lastname, mail, role 
                            FROM users, roles
                            WHERE roles.id = users.UsersRoles AND users.id = :iduser");
                    
        $data->execute(array('iduser' => $idUser));
        return $data->fetch();
    }

    // Mise à jour d'un utilisateur en fonction de son id

    public function updateUserInfos($idUser, $lastname, $firstname, $roleid)
    {
        $bdd = $this->dbConnection();
        $data = $bdd->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, UsersRoles = :roleid
                               WHERE id = :iduser");
                    
        $data->execute(array(
            'iduser' => $idUser,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'roleid' => $roleid['id']                   
        ));

    }

    
    
}
