<?php

namespace App\Controller;


use App\Repository\CategoryRepository;

class  PageController extends Controller
{
    public function home(): void // action
    {

        $greetings = "Bonjour";
        $name = "World";
        /*
         * */
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->findById(1);
        $categories = $categoryRepository->findAll();
        $this->render('page/home', [
            "categories" => $categories]);
    }


    public function about(): void // action
    {
        $this->render('page/about');
    }
}