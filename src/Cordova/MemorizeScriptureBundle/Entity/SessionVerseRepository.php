<?php

namespace Cordova\MemorizeScriptureBundle\Entity;
 
use Doctrine\ORM\EntityRepository;
 
class SessionVerseRepository extends EntityRepository
{
    public function getLatestSessionVerses($limit = 5)
    {
        $dql = 'SELECT s, v FROM Cordova\MemorizeScriptureBundle\Entity\SessionVerse s ' .
               'INNER JOIN s.verse v ' .
               'ORDER BY s.createdAt DESC';
 
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($limit);
 
        return $query->getResult();
    }

    
}
