<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TrackerController extends Controller
{
    public function indexAction()
    {
        //return $this->render('MemorizeScripture:Tracker:index.html.twig');
	    $em = $this->get('doctrine.orm.entity_manager');
        $users = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\User')->getLatestUsers();
        //$session = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\Session')->getLatestSession();
	    //$sessionverses = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\SessionVerse')->getLatestSessionVerses();

	    return $this->render(
		    'MemorizeScriptureBundle:Tracker:index.html.twig',
		        array(
                    'users' => $users,
                    //'sessionverses' => $sessionverses;
		        )
	    );
    }
    
    public function welcomeAction()
    {
        return $this->render('MemorizeScriptureBundle:Tracker:index.html.twig');
    }

    public function addRecitationAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $sessionverse = $em->find('Cordova\MemorizeScriptureBundle\Entity\SessionVerse',$id);
        $Recitedyesno = $sessionverse->getRecitedyesno();
        if ($Recitedyesno == 'yes') {
            $sessionverse->setRecitedyesno('no');
        } else {
            $sessionverse->setRecitedyesno('yes');
        }
        $Recitedyesno = $sessionverse->getRecitedyesno();
        $em->flush();

        $arr = array(
                "id" => $id,
                "Recitedyesno" => $Recitedyesno,
                "someother" => "luis"
        );
        return new Response(json_encode($arr));
    }
}
