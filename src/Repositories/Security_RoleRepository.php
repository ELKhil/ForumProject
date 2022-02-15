<?php

namespace App\Repositories;

class Security_RoleRepository extends Repository
{



    public function __construct()
    {
        parent::__construct("security_role");
    }

    public function findAllByUserId($id): array
    {

        $queryStr = "SELECT r.* from $this->tableName r JOIN security_user_roles su on r.role_id = su.role_id WHERE user_id = :id";
        $query = $this->connexion->prepare($queryStr);

        if ($query !== false) {

            $query->execute([":id" => $id]);
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }
}