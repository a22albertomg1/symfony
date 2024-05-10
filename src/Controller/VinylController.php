<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
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

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug){
            $title = 'Pajuma es: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'Pajuma pringao.';
        }

        return new Response($title);
    }
}