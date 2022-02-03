<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use App\Repository\MangaRepository;
use App\Repository\TomeRepository;


class GestionController extends AbstractController
{

    private $mangaRepository;
    private $tomeRepository;

    public function __construct(MangaRepository $mangaRepository, TomeRepository $tomeRepository)
    {
        $this->mangaRepository = $mangaRepository;
        $this->tomeRepository = $tomeRepository;
    }
    
    #[Route('/gestion', name: 'gestion')]
    public function index(string $data = "default", Request $request): Response
    {

        
        if($request->isMethod('POST')){
            $data = $request->request->all();
            // dd($data);

            // Ajout d'un tome
            if(isset($data['selectManga'])){

                $id_manga = $data['selectManga'];
                $num_tome = $data['numero'];
                $prix = $data['prix'];
                $editeur = $data['editeur'];
                if(isset($data['idSideS'])){
                    $sideStory = $data['sideStory'];
                    $id_sideS = $data['idSideS'];
                }
                else{
                    $sideStory = null;
                    $id_sideS = null;
                }
                $this->tomeRepository->addTome($id_manga, $num_tome, $prix, $editeur, $sideStory, $id_sideS);
            }   
            // Ajout d'un Manga
            else {

                $nom_manga = $data['nom'];
                $date_debut = $data['dateDebut'];	
                $date_fin = $data['dateFin'] != "" ? $data['dateFin'] : null;
                $status = $data['status'];

                $this->mangaRepository->addManga($nom_manga, $date_debut, $date_fin, $status);

            }

        }


        $data = $this->mangaRepository->findAll();
        return $this->render('gestion/gestion.html.twig', [
            "data" => $data
        ]);
    }
}
