<?php

namespace Framework\Http;

class Response
{
    const BASE_DIR = __DIR__. "/../../src/Views/";

    private string $view;
    private array $params;

    private function __construct(string $view, array $params = [])
    {
        $this->view = $view;
        $this->params = $params;
    }

    public function display(): void {
        //"Crée un nouveau fichier PHP dans l'ordre suivant
        ob_start();
        //1. Déclaration des variables [key => value] ==> $key
        extract($this->params);

        //2. Récupération du reste de la page php => la vue
        $view = $this->view;
        require_once self::BASE_DIR. "$view.php";

        //3. Joindre tous dans le nouveau fichier
        $content = ob_get_clean();

        echo $content;
    }

    public static function send(string $view, array $params = []): Response {
        return new Response($view, $params);
    }
    public static function sendJson(array $params = []): string {
        return json_encode($params);
    }
    public static function redirectToUrl(string $url) {
        header("location: $url");
        die();
    }
}