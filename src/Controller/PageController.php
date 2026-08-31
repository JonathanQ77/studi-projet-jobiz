<?php

namespace App\Controller;

class  PageController extends Controller
{
    public function home(): void // action
    {

        $greetings = "Bonjour";
        $name = "World";

        $this->render('page/home', ["greeting" => $greetings, "name" => $name]);
    }


    public function about(): void // action
    {
        $this->render('page/about');
    }
}