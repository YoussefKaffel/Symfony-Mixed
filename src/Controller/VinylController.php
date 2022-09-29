<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{
    #[Route('/')]
    public function homePage() : Response
    {
        return new Response ('{ "message": "Hello World!" }');
    }
    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) : Response
    {
        if ($slug === null) {
            return new Response ('{ "message": "Browse all vinyls" }');
        }
        $title = str_replace('-', ' ', $slug);
        $title = u($title)->title(true);
        return new Response ('{ message:' .$title .'}');
    }
}