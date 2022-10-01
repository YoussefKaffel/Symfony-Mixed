<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/song/{id</d+>}', methods: ['GET'])]
    public function getSong(int  $id, LoggerInterface $logger):Response
    {
        $song = [
            'id' => $id,
            'title' => 'Song Title',
            'artist' => 'Artist Name',
            'album' => 'Album Name',
            'year' => 2021,
        ];
        return $this->json($song);
    }

}