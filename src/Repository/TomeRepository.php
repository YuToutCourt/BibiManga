<?php

namespace App\Repository;

use App\Entity\Tome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

use Doctrine\DBAL\DriverManager;


/**
 * @method Tome|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tome|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tome[]    findAll()
 * @method Tome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tome::class);
    }

    // /**
    //  * @return Tome[] Returns an array of Tome objects
    //  */


    public function connexion(){
        $conn = DriverManager::getConnection(array(
            'dbname' => 'BibiManga',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ));
        return $conn;
    }


    public function addTome($id_manga, $numero_tome, $prix, $editeur, $side_story, $id_side_s){
        $qy = $this->connexion()->createQueryBuilder();
        $qy->insert('tome')->values(
            array('id_manga' => '?',
                'numero_tome' => '?',
                'prix' => '?',
                'editeur' => '?',
                'side_story' => '?',
                'id_side_s' => '?'))->setParameters(array($id_manga,$numero_tome,$prix,$editeur,$side_story,$id_side_s));

        $qy->executeQuery();
        
    }
    
    public function findAllTomeByMangaID(int $id)
    {
        $qb =  $this->createQueryBuilder('t');
        
        $qb->select('t.lu, t.prix,t.numeroTome,t.editeur,t.id_tome,t.sideStory,t.idSideS,m.nom,m.id')
            ->distinct()
            ->from('App\Entity\Tome', 'T')
            ->innerJoin('App\Entity\Manga', 'm','WITH', 't.idManga = m.id')
            ->where('t.idManga = :id')
            ->setParameter('id', $id)
            ->orderBy('t.numeroTome', 'ASC');


        return $qb->getQuery()->getResult();
    }

    public function findAllDb(){

        $qb =  $this->createQueryBuilder('t');

        $qb->select('t.lu, t.prix,t.numeroTome,t.editeur,t.id_tome,t.idManga,t.sideStory,t.idSideS,m.nom,m.id,m.startDate,m.endDate,m.status')
            ->distinct()
            ->from('App\Entity\Tome', 'T')
            ->innerJoin('App\Entity\Manga', 'm','WITH', 't.idManga = m.id')
            ->orderBy('t.numeroTome', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function updateTomeById($id_tome,$valueOfRead){
        $qy = $this->connexion()->createQueryBuilder();
        $qy->update('tome')->set('lu', '?')->setParameter(0, $valueOfRead)->where('id_tome = ?')->setParameter(1, $id_tome);
        $qy->executeQuery();
    }



}
