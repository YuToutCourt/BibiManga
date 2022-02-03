<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MangaRepository;

class HomeController extends AbstractController
{

    private $mangaRepository;

    public function __construct(MangaRepository $mangaRepository)
    {
        $this->mangaRepository = $mangaRepository;
    }

    #[Route('/home/{mangas}', name: 'home')]
    public function index(string $mangas = "default"): Response
    {
        $allManga = $this->mangaRepository->findAll();
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',"mangas"=> $allManga
        ]);
    }
}
