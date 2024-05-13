<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'La Flaca',
            'url' => 'https://youtu.be/r2g0pM3PMNQ?si=Ro19pxuORa8Yaw_4'
        ];

        $logger->info('Returning API response for song {song}', [
            'song' => $id,
        ]);
        return $this->json($song);
    }
}