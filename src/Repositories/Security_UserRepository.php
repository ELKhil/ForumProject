<?php

namespace App\Repositories;

use App\Models\Security_User;

class Security_UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("security_user");
    }




    //ajouter un user au db
    public function register(string $username, string $password, string $email = null): array {

        $queryStr = "INSERT INTO $this->tableName(user_name, user_password, user_email, active, createdAt, updatedAt) VALUES (:username, :password, :email, TRUE, NOW(), NOW())";
        $query = $this->connexion->prepare($queryStr);


        if ($query !== false) {
            $query->execute([
                ":username" => $username,
                ":password" => password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]),
                ":email" => empty($email) ? null : $email
            ]);

            return ["id" => $this->connexion->lastInsertId()];
        }

        return [];
    }


    //fonction qui vérifie si l'utilisateur existe
    public function login(string $username, string $password): array {

        $queryStr = "SELECT * FROM $this->tableName WHERE user_name = :username and active = 1";
        $query = $this->connexion->prepare($queryStr);

        if ($query !== false) {
            $query->execute([
                ":username" => $username
            ]);

            $user = $query->fetch(\PDO::FETCH_ASSOC);

            if($user){
                if (password_verify($password, $user['user_password'])) {
                    return $user;
                }
            }

        }
        return [];
    }
    //fonction qui récupére le nom de l'user
    public function findByUserId($id): array
    {

        $queryStr = "SELECT user_name from $this->tableName WHERE user_id = :id";
        $query = $this->connexion->prepare($queryStr);

        if ($query !== false) {
            $query->execute([":id" => $id]);
            return $query->fetch();
        }

        return [];
    }


    public function showAllUsers()
    {

        $queryStr = "SELECT * FROM $this->tableName where user_id <> :id";
        $query = $this->connexion->prepare($queryStr);

        $query->execute([
            ":id" => $_SESSION["user"]["user_id"]
        ]);

        $objs = $query->fetchAll(\PDO::FETCH_ASSOC);
        $userAll = [];
        foreach ($objs as $obj){
            $user_id = $obj["user_id"];
            $user_name = $obj["user_name"];
            $user_password = $obj["user_password"];
            if ($obj["user_email"] != null) {
                $user_email = $obj["user_email"];
            }else{
                $user_email = "";
            }

            $active = $obj["active"];
            $createdAt = \DateTime::createFromFormat("Y-m-d",$obj["createdAt"]);
            $updatedAt = \DateTime::createFromFormat("Y-m-d",$obj["updatedAt"]);
            $user = new Security_User($user_id, $user_name, $user_password, $user_email, $active, $createdAt, $updatedAt);
            if($user->isActive()){
                $userAll[] = $user;
            }

        }
        return $userAll;

    }
    public function bannirById($id)
    {
        $queryStr = "UPDATE $this->tableName SET active = 0 WHERE user_id = :id";
        $query = $this->connexion->prepare($queryStr);

        $query->execute([
            ":id" => $id
        ]);

    }
}