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

    public function getTodayVerses($user_id) {

        $dql = 'SELECT sv, v, s, u FROM MemorizeScriptureBundle:SessionVerse sv '.
                'INNER JOIN sv.verse v '.
                'INNER JOIN sv.session s '.
                'INNER JOIN s.user u '.
                'WHERE u.id = ?1 '.
                'AND sv.createdAt > ?2 AND sv.createdAt < ?3 '.
                'ORDER BY sv.createdAt DESC';
                //'WHERE u.id = :uid';
        
        $query = $this->getEntityManager()->createQuery($dql);
        $earliest = 1;
        $latest = 1;
        $query->setParameter(1, $user_id);
        $query->setParameter(2, $earliest);
        $query->setParameter(3, $latest);

        /*$dateA = new DateTime('yesterday');
        $dateB = new DateTime('tomorrow');
        if ($dateB > $dateA) {
            // yay, tomorrow happens after yesterday
        } else {
            // someone call the Aztecs!
        }*/

        return $query->getResult();
        
    }
}
