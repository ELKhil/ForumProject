<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{
          public function __construct()
                    {
                        parent::__construct("categories");
                    }

    public function findAll()
    {

        $queryStr = "SELECT * FROM $this->tableName";
        $query = $this->connexion->prepare($queryStr);

        $query->execute();

        $objs = $query->fetchAll(\PDO::FETCH_ASSOC);
        $catAll = [];
        foreach ($objs as $obj){
            $category_id = $obj["category_id"];
            $category_title = $obj["category_title"];
            if ($obj["category_desc"] != null) {
                $category_desc = $obj["category_desc"];
            }else{
                $category_desc = "";
            }
            $creator_id = $obj["creator_id"];
            if ($obj["moderator_id"] != null) {
                $moderator_id = $obj["moderator_id"];
            }else{
                $moderator_id = 0;
            }
            $active = $obj["active"];
            $createdAt = \DateTime::createFromFormat("Y-m-d",$obj["createdAt"]);
            $updatedAt = \DateTime::createFromFormat("Y-m-d",$obj["updatedAt"]);
            $cat = new Category($category_id, $category_title, $category_desc, $creator_id, $moderator_id, $active, $createdAt, $updatedAt);
            $catAll[] = $cat;
        }
        return $catAll;

    }
}