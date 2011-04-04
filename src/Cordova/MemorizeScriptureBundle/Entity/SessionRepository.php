<?php

namespace Cordova\MemorizeScriptureBundle\Entity;
 
use Doctrine\ORM\EntityRepository;
 
class SessionRepository extends EntityRepository
{
    public function getLatestSessions($limit = 5)
    {
        $dql = 'SELECT s, v FROM Cordova\MemorizeScriptureBundle\Entity\Session s ' .
               //'INNER JOIN s.verse v ' .
               'ORDER BY s.createdAt DESC';
 
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($limit);
 
        return $query->getResult();
    }
}
