<?php

namespace App\Repository;

use App\Entity\Category;
use PDO;

class CategoryRepository extends Repository
{
    /*
     *
     * */
    public function findAll(): array
    {
        $query = $this->pdo->prepare('SELECT id, name FROM category ');
        $query->execute();
        // hydration automatique par pdo
        //$categories = $query->fetchAll($this->pdo::FETCH_CLASS, Category::class); // fetchAll() retourne l'entité

        $categories = $query->fetchAll($this->pdo::FETCH_ASSOC); // fetchAll() un tableau
        $categoriesArray = [];
        if ($categories) {
            foreach ($categories as $category) {
                $categoriesArray[] = Category::createAndHydrate($category);
            }
        }
        return $categoriesArray;
    }

    // hydratation manuelle
    public function findById(int $id): Category
    {
        $query = $this->pdo->prepare('SELECT id, name FROM category WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $categoryArray = $query->fetch($this->pdo::FETCH_ASSOC);
        // hydrate
        return Category::createAndHydrate($categoryArray);
    }
}