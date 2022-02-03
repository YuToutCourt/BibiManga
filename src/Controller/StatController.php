<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TomeRepository;

class StatController extends AbstractController
{
    private $tomeRepository;

    public function __construct(TomeRepository $tomeRepository)
    {
        $this->tomeRepository = $tomeRepository;
    }

    #[Route('/stat/{stats}', name: 'stat')]
    public function index(string $stats = "default"): Response
    {
        $stats = $this->tomeRepository->findAllDb();
        return $this->render('stat/stat.html.twig', [
        "stats" => $stats
        ]);
    }
}
