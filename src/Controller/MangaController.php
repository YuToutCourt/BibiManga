<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\TomeRepository;
use App\Repository\MangaRepository;

class MangaController extends AbstractController
{

    private $tomeRepository;
    private $mangaRepository;

    public function __construct(TomeRepository $tomeRepository, MangaRepository $mangaRepository)
    {
        $this->tomeRepository = $tomeRepository;
        $this->mangaRepository = $mangaRepository;
    }

    
    #[Route('/manga/{nom}', name: 'manga')]
    public function index(string $nom, int $id = 0, Request $request): Response
    {   

        if($request->getMethod("POST")){
            $data = $request->request->all();
            if(!empty($data)){

                $id_tome = $data['id'];
                $tome = $this->tomeRepository->find($id_tome);
                $isRead = $tome->getLu() == 0 ? 1 : 0;
                $this->tomeRepository->updateTomeById($id_tome,$isRead);
            }

        }
        $manga = $this->mangaRepository->getIdMangaByNom($nom);
        if(empty($manga)){
            return $this->redirectToRoute('home');
        }
        $new_id = $manga[0]["id"];
        // id == va représenter le id du manga
        $mangas = $this->tomeRepository->findAllTomeByMangaID($new_id);
        return $this->render('manga/manga.html.twig', [
            'controller_name' => 'MangaController',"id"=> $mangas
        ]);
        
        // ici id sera un tableau de tome qui contiendra tous les tomes du manga
    }
    

}
