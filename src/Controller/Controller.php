<?php

namespace App\Controller;

class Controller
{
    protected function render(string $path, array $params = []): void
    { // gère l'affichage de la page
        $filePath = APP_ROOT . "/templates/$path.php";
        // si le chemin n'existe pas, on renvoie une erreur 404'
        if (!file_exists($filePath)) {
            echo "Le fichier n'existe pas";
        } else {
            extract($params); // permet d'utiliser les variables dans le fichier'
            require_once $filePath;
        }
    }
}
