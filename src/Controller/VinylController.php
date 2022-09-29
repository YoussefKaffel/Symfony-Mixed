<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homePage() : Response
    {
        $tracks=[
         ['song'=> 'Track 1','artist'=>'Artist 1','album'=>'Album 1','year'=>2021],
            ['song'=>   'Track 2', 'artist'=>'Artist 2','album'=>'Album 2','year'=>2021],
            ['song'=>  'Track 3',    'artist'=>'Artist 3','album'=>'Album 3','year'=>2021],
            ['song'=>  'Track 4',   'artist'=>'Artist 4','album'=>'Album 4','year'=>2021],
        ];
        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'Vinyl Records',
            'tracks' => $tracks,
        ]);
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