<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['cancion' => 'La Flaca', 'artista' => 'Jarabe de Palo'],
            ['cancion' => 'La Camisa Negra', 'artista' => 'Juanes'],
            ['cancion' => 'Vivir Mi Vida', 'artista' => 'Marc Anthony'],
            ['cancion' => 'A Dios le Pido', 'artista' => 'Juanes'],
            ['cancion' => 'Volare', 'artista' => 'Gipsy Kings'],
            ['cancion' => 'La Bamba', 'artista' => 'Ritchie Valens'],
            ['cancion' => 'Clandestino', 'artista' => 'Manu Chao'],
            ['cancion' => 'La Cumparsita', 'artista' => 'Carlos Gardel'],
            ['cancion' => 'La Macarena', 'artista' => 'Los del Río']
        ];
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);

    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
           'genre' => $genre,
        ]);
    }
}