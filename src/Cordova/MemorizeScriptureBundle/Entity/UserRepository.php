<?php

namespace Cordova\MemorizeScriptureBundle\Entity;
 
use Doctrine\ORM\EntityRepository;
 
class UserRepository extends EntityRepository
{
    public function getLatestUsers($limit = 5)
    {
        $dql = 'SELECT u FROM Cordova\MemorizeScriptureBundle\Entity\User u ' .
               //'INNER JOIN u.verse s ' .
               'ORDER BY u.createdAt DESC';
 
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($limit);
 
        return $query->getResult();
    }
}