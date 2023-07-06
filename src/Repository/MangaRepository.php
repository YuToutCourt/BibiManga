<?php

namespace App\Repository;

use App\Entity\Manga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\DBAL\DriverManager;


/**
 * @method Manga|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manga|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manga[]    findAll()
 * @method Manga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MangaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Manga::class);
    }

    public function connexion(){
        $conn = DriverManager::getConnection(array(
            'dbname' => 'BibiManga',
            'user' => 'root',
            'password' => '1234',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ));
        return $conn;
    }


    public function addManga($nom, $date_debut, $date_fin, $status){
        $qy = $this->connexion()->createQueryBuilder();
        $qy->insert('manga')->values(
            array('nom' => '?',
                'start_date' => '?',
                'end_date' => '?',
                'status' => '?'))->setParameters(array($nom,$date_debut,$date_fin,$status));

        $qy->executeQuery();
        
    }

    public function getIdMangaByNom($nom){
        $qb =  $this->createQueryBuilder('m');
        $qb->select('m.id')->where('m.nom = :nom')->setParameter('nom', $nom);
        $result = $qb->getQuery()->getResult();
        return $result;
    }

}
