<?php

namespace App\Repositories;

use App\Models\Thread;

class ThreadRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("threads");
    }

    public function findAllByCategoryId($id):array
    {

        $queryStr = "SELECT * FROM $this->tableName WHERE category_id = :id";
        $query = $this->connexion->prepare($queryStr);

        $query->execute(array(
            ":id" => $id
        ));

        $objs = $query->fetchAll(\PDO::FETCH_ASSOC);
        $threadAll = [];
        foreach ($objs as $obj){
            $thread_id = $obj["thread_id"];
            $thread_title = $obj["thread_title"];
            $creator_id = $obj["creator_id"];
            if ($obj["moderator_id"] != null) {
                $moderator_id = $obj["moderator_id"];
            }else{
                $moderator_id = 0;
            }
            $category_id = $obj["category_id"];
            $active = $obj["active"];
            $createdAt = \DateTime::createFromFormat("Y-m-d",$obj["createdAt"]);
            $updatedAt = \DateTime::createFromFormat("Y-m-d",$obj["updatedAt"]);
            $thread = new Thread($thread_id, $thread_title, $creator_id, $moderator_id, $category_id, $active, $createdAt, $updatedAt);
            $threadAll[] = $thread;
        }
        return $threadAll;

    }
}