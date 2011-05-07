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

        /*$dql = 'SELECT s, v FROM Cordova\\MemorizeScriptureBundle\\Entity\\SessionVerse s ' .
               'INNER JOIN s.session g ' .
               'INNER JOIN g.user u ' .
               'WHERE u.id = ?1' .
               'ORDER BY s.createdAt DESC';*/

        $dql = 'SELECT sv, v, s, u FROM MemorizeScriptureBundle:SessionVerse sv '.
                'INNER JOIN sv.verse v '.
                'INNER JOIN sv.session s '.
                'INNER JOIN s.user u '.
                'WHERE u.id = ?1 '.
                'ORDER BY sv.createdAt DESC';
                //'WHERE u.id = :uid';
        
        $query = $this->getEntityManager()->createQuery($dql);
        //$user = $this->container->get('security.context')->getToken()->getUser();
        $query->setParameter(1, $user_id);

        return $query->getResult();
        
    }
}
