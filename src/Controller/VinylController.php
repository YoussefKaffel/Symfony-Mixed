<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/',name:'app_homepage')]
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
    #[Route('/browse/{slug}',name:'app_browse')]
    public function browse(string $slug = null) : Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig',[
            'genre' => $genre,
        ]);
    }
}