<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\TomeRepository;

class ToReadController extends AbstractController
{

    private $tomeRepository;

    public function __construct(TomeRepository $tomeRepository)
    {
        $this->tomeRepository = $tomeRepository;
    }

    #[Route('/lecture', name: 'to_read')]
    public function index(string $tome = "default", Request $request): Response
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



        $tome = $this->tomeRepository->findAllDb();
        return $this->render('to_read/lecture.html.twig', [
            'tomes' => $tome,
        ]);
    }
}
