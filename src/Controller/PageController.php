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
        $categories = $categoryRepository->findAll();
        $this->render('page/home', [
            "greeting" => $greetings,
            "name" => $name,
            "categories" => $categories]);
    }


    public function about(): void // action
    {
        $this->render('page/about');
    }
}